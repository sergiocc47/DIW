#SCRIPT DE CREACION

#ELIMINO LA BASE DE DATOS SI EXISTE PREVIAMENTE
DROP DATABASE IF EXISTS bddiwgeneradorcarteles;

#CREACION DE LA BASE DE DATOS
CREATE DATABASE bddiwgeneradorcarteles;

USE bddiwgeneradorcarteles;


#CREACION DE LAS TABLAS
CREATE TABLE carteles (
	id_cartel INT NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(255),
	ponente TEXT NOT NULL,
	lugar VARCHAR(41) NOT NULL,		-- lugar más largo (España): Colinas del Campo de Martín Moro Toledano
	fecha DATE NOT NULL,	-- valorar VARCHAR(255) si aparecen problemas
	foto VARCHAR(255),
	texto_explicativo TEXT NOT NULL,
	color_fondo VARCHAR(20) NOT NULL,	-- color más largo: lightgoldenrodyellow
	CONSTRAINT pk_id_cartel PRIMARY KEY (id_cartel)
) CHARACTER SET utf8;

#INSERCIÓN DE DATOS EN LA TABLA
INSERT INTO carteles VALUES ('0','CARTEL PONENCIA 1','Antonio Fernández López','Ponferrada',now(),'./img/carteles/cartel_1.png','TEXTO EXPLICATIVO CARTEL 1','#ff0000');
INSERT INTO carteles VALUES ('0','CARTEL PONENCIA 2','Elena Rodríguez García','Bembibre',DATE_ADD(now(), INTERVAL 1 DAY),'./img/carteles/cartel_2.png','TEXTO EXPLICATIVO CARTEL 2','#0000ff');
INSERT INTO carteles VALUES ('0','CARTEL PONENCIA 3','Pedro Gutiérrez Blanco','Cacabelos',DATE_ADD(now(), INTERVAL 2 DAY),null,'TEXTO EXPLICATIVO CARTEL 3','#008000');