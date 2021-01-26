﻿#SCRIPT DE CREACION

#ELIMINO LA BASE DE DATOS SI EXISTE PREVIAMENTE
DROP DATABASE IF EXISTS bddiwpracticavideo;

#CREACION DE LA BASE DE DATOS
CREATE DATABASE bddiwpracticavideo;

USE bddiwpracticavideo;


#CREACION DE LAS TABLAS
CREATE TABLE titulos (
	id_titulo INT NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(50) NOT NULL,
	CONSTRAINT pk_referencia PRIMARY KEY (id_titulo)
) CHARACTER SET utf8;

#INSERCIÓN DE DATOS EN LA TABLA
INSERT INTO titulos VALUES ('0','Práctica de vídeo');