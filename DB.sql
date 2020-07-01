-- ********************************************
-- DROP TABLES SECTION
-- ********************************************

DROP TABLE socios CASCADE;
DROP TABLE socios;

-- ********************************************
-- CREATE TABLES SECTION
-- ********************************************



CREATE TABLE socios
(
   id integer NOT NULL,
   tipo integer NOT NULL,
   nombre character varying NOT NULL,
   contraseña character varying NOT NULL,
   curp integer NOT NULL
)
WITH(
OIDS=FALSE
);
ALTER TABLE socios
OWNER TO postgres;


CREATE TABLE socios
(
   id integer NOT NULL,
   tipo integer NOT NULL,
   nombre text NOT NULL,
   contraseña varchar(15) NOT NULL,
   curp text NOT NULL
);

-- ********************************************
-- TEST DATA SECTION
-- ********************************************
INSERT INTO socios(id,tipo,nombre, contraseña, curp) VALUES (1,1,'Jessica', '123', 'FARJ940102');
-- ********************************************
---QUERY SECCION
-- ********************************************