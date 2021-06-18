------------------------------
-- Archivo de base de datos --
------------------------------

INSERT INTO productos ("denominacion", "categoria_id", "precio")
VALUES ('Tornillo', 1, 1.20),
        ('Chapa', 2, 1.30);

INSERT INTO fabricados ("id", "ancho", "alto")
VALUES (2, 1, 3);

CREATE EXTENSION pgcrypto;

INSERT INTO usuarios ("nombre", "password")
VALUES ('pepe', crypt('pepe', gen_salt('bf', 4))),
    ('juan', crypt('juan', gen_salt('bf', 4)));

INSERT INTO pedidos ("fecha_hora", "usuario_id", "producto_id", "cantidad")
VALUES (LOCALTIMESTAMP, 1, 1, 10),
    (LOCALTIMESTAMP, 1, 2, 5);