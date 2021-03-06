﻿#SCRIPT DE CREACION

#ELIMINO LA BASE DE DATOS SI EXISTE PREVIAMENTE
DROP DATABASE IF EXISTS bddiwcurriculumvitae;

#CREACION DE LA BASE DE DATOS
CREATE DATABASE bddiwcurriculumvitae;

USE bddiwcurriculumvitae;


#CREACION DE LAS TABLAS
CREATE TABLE cvs (
	id_cv INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	foto VARCHAR(255) NOT NULL,
	personal VARCHAR(255) NOT NULL,
	formativo TINYTEXT NOT NULL,
	laboral TEXT NOT NULL,
	CONSTRAINT pk_id_cv PRIMARY KEY (id_cv)
) CHARACTER SET utf8;

#INSERCIÓN DE DATOS EN LA TABLA
INSERT INTO cvs VALUES ('0','Nombre y Apellidos del Usuario','./img/usuario/user.png','INFORMACIÓN PERSONAL','INFORMACIÓN FORMATIVO','INFORMACIÓN LABORAL');