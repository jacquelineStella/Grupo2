/*
-- ================  SCRIPT SQL  ===============
-- Author:    Jonathan
-- Create date: 22/09/2017
-- Description: Tablas con Relaciones v1
--              Falta completar tabla servicios.
-- =============================================
*/

CREATE TABLE USUARIO
       (
       ID_USUARIO BIGINT NOT NULL AUTO_INCREMENT,                              
       NOMBRE VARCHAR(20) NOT NULL,                              
       APELLIDO CHAR(20) NOT NULL,                              
       EMAIL VARCHAR(320) NOT NULL,                              
       TELEFONO BIGINT NOT NULL,                              
       CLAVE VARCHAR(60) NOT NULL,                              
       PRIMARY KEY
               (
               ID_USUARIO
               )
       );



CREATE TABLE MOTIVO
       (
       ID_MOTIVO INT NOT NULL AUTO_INCREMENT,                              
       DESCRIPCION VARCHAR(60) NOT NULL,                              
       PRIMARY KEY
               (
               ID_MOTIVO
               )
       );



CREATE TABLE RAZA
       (
       ID_RAZA INT NOT NULL AUTO_INCREMENT,                              
       DESCRIPCION VARCHAR(60) NOT NULL,                              
       PRIMARY KEY
               (
               ID_RAZA
               )
       );



CREATE TABLE UBICACION
       (
       ID_UBICACION BIGINT NOT NULL AUTO_INCREMENT,                              
       LATITUD BIGINT NOT NULL,                              
       LONGITUD BIGINT NOT NULL,                              
       PRIMARY KEY
               (
               ID_UBICACION
               )
       );



CREATE TABLE PUBLICACION
       (
       ID_PUBLICACION BIGINT NOT NULL AUTO_INCREMENT,                              
       ID_USUARIO BIGINT NOT NULL,                              
       ID_UBICACION BIGINT NOT NULL,                              
       ID_MOTIVO INT NOT NULL,                              
       FECHA_INICIO DATETIME NOT NULL,                              
       FECHA_FIN DATETIME NOT NULL,                              
       ESTADO BIT NOT NULL,                              
       PRIMARY KEY
               (
               ID_PUBLICACION
               ),
       FOREIGN KEY
               (
               ID_USUARIO
               )
          REFERENCES USUARIO
               (
               ID_USUARIO
               ),
       FOREIGN KEY
               (
               ID_UBICACION
               )
          REFERENCES UBICACION
               (
               ID_UBICACION
               ),
       FOREIGN KEY
               (
               ID_MOTIVO
               )
          REFERENCES MOTIVO
               (
               ID_MOTIVO
               )
       );



CREATE TABLE SERVICIO
       (
       ID_SERVICIOS BIGINT NOT NULL AUTO_INCREMENT,                              
       ID_USUARIO BIGINT NOT NULL,                              
       DESCRIPCION VARCHAR(128) NOT NULL,                              
       PRIMARY KEY
               (
               ID_SERVICIOS
               ),
       FOREIGN KEY
               (
               ID_USUARIO
               )
          REFERENCES USUARIO
               (
               ID_USUARIO
               )
       );



CREATE TABLE ESPECIE
       (
       ID_ESPECIE INT NOT NULL AUTO_INCREMENT,                              
       ID_RAZA INT NOT NULL,                              
       DESCRIPCION VARCHAR(60) NOT NULL,                              
       PRIMARY KEY
               (
               ID_ESPECIE
               ),
       FOREIGN KEY
               (
               ID_RAZA
               )
          REFERENCES RAZA
               (
               ID_RAZA
               )
       );



CREATE TABLE MASCOTA
       (
       ID_MASCOTA BIGINT NOT NULL AUTO_INCREMENT,                              
       ID_ESPECIE INT NOT NULL,                              
       ID_PUBLICACION BIGINT NOT NULL,                              
       FOTO VARCHAR(30) NOT NULL,                              
       COLOR VARCHAR(128) NOT NULL,                              
       EDAD INT NOT NULL,                              
       PRIMARY KEY
               (
               ID_MASCOTA
               ),
       FOREIGN KEY
               (
               ID_ESPECIE
               )
          REFERENCES ESPECIE
               (
               ID_ESPECIE
               ),
       FOREIGN KEY
               (
               ID_PUBLICACION
               )
          REFERENCES PUBLICACION
               (
               ID_PUBLICACION
               )
       );



