#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U recuperacionphp -d recuperacionphp < $BASE_DIR/recuperacionphp.sql
    if [ -f "$BASE_DIR/recuperacionphp_test.sql" ]; then
        psql -h localhost -U recuperacionphp -d recuperacionphp < $BASE_DIR/recuperacionphp_test.sql
    fi
    echo "DROP TABLE IF EXISTS migration CASCADE;" | psql -h localhost -U recuperacionphp -d recuperacionphp
fi
psql -h localhost -U recuperacionphp -d recuperacionphp_test < $BASE_DIR/recuperacionphp.sql
echo "DROP TABLE IF EXISTS migration CASCADE;" | psql -h localhost -U recuperacionphp -d recuperacionphp_test
