#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE recuperacionphp_test;"
    psql -U postgres -c "CREATE USER recuperacionphp PASSWORD 'recuperacionphp' SUPERUSER;"
else
    [ "$1" = "test" ] || sudo -u postgres dropdb --if-exists recuperacionphp
    sudo -u postgres dropdb --if-exists recuperacionphp_test
    [ "$1" = "test" ] || sudo -u postgres dropuser --if-exists recuperacionphp
    [ "$1" = "test" ] || sudo -u postgres psql -c "CREATE USER recuperacionphp PASSWORD 'recuperacionphp' SUPERUSER;"
    [ "$1" = "test" ] || sudo -u postgres createdb -O recuperacionphp recuperacionphp
    [ "$1" = "test" ] || sudo -u postgres psql -d recuperacionphp -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O recuperacionphp recuperacionphp_test
    sudo -u postgres psql -d recuperacionphp_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    [ "$1" = "test" ] && exit
    LINE="localhost:5432:*:recuperacionphp:recuperacionphp"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
