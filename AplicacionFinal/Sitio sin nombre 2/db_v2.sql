/*
-- ================  SCRIPT SQL  ===============
-- Author:    Jonathan
-- Create date: 30/09/2017
-- Description: Tablas con Relaciones v2
--              
-- =============================================
*/
/*   SCRIPT SQL  - Tablas con Restricciones -   */

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



CREATE TABLE MASCOTA
       (
       ID_MASCOTA BIGINT NOT NULL AUTO_INCREMENT,                            
       FOTO VARCHAR(30) NOT NULL,                              
       COLOR VARCHAR(128) NOT NULL,                              
       EDAD INT NOT NULL,                              
       ESPECIE VARCHAR(128) NOT NULL,                              
       RAZA VARCHAR(128) NOT NULL,                              
       PRIMARY KEY
               (
               ID_MASCOTA
               )
       );



CREATE TABLE PUBLICACION
       (
       ID_PUBLICACION BIGINT NOT NULL AUTO_INCREMENT,                             
       ID_USUARIO BIGINT NOT NULL,                              
       ID_MASCOTA BIGINT NOT NULL,                              
       FECHA_INICIO DATETIME NOT NULL,                              
       FECHA_FIN DATETIME NOT NULL,                              
       ESTADO BIT NOT NULL,                              
       MOTIVO VARCHAR(60) NOT NULL,                              
       DIRECCION VARCHAR(128) NOT NULL,                              
       LATITUD DECIMAL(10,6) NOT NULL,                              
       LONGITUD DECIMAL(10,6) NOT NULL,                              
       NOMBRE VARCHAR(128) NOT NULL,                              
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
               ID_MASCOTA
               )
          REFERENCES MASCOTA
               (
               ID_MASCOTA
               )
       );



CREATE TABLE SERVICIO
       (
       ID_SERVICIOS BIGINT NOT NULL AUTO_INCREMENT,                            
       ID_USUARIO BIGINT NOT NULL,                              
       NOMBRE VARCHAR(128) NOT NULL,                              
       CALIFICACION_POS BIGINT NOT NULL,                              
       CALIFICACION_NEG BIGINT NOT NULL,                              
       DIRECCION VARCHAR(128) NOT NULL,                              
       LATITUD DECIMAL(10,6) NOT NULL,                              
       LONGITUD DECIMAL(10,6) NOT NULL,                              
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



