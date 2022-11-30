CREATE DATABASE Prueba_tecnica;

CREATE TABLE tipo(
	ID int AUTO_INCREMENT not null,
    NOMBRE varchar(100) not null,
    CONSTRAINT PK_Tipo PRIMARY KEY (ID) 
);

CREATE TABLE maquina(
	ID int AUTO_INCREMENT not null,
    CODIGO varchar(100) not null,
    NOMBRE varchar(300) not null,
    TIPO_ID int not null,
    DESCRIPCION varchar(300) not null,
    CONSTRAINT PK_Maquina PRIMARY KEY (ID),
    CONSTRAINT FK_Maquina_Tipo FOREIGN KEY(TIPO_ID) REFERENCES tipo(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO tipo(NOMBRE) VALUES('Imprenta'),
('Pegadora'),
('Troqueladora'),
('Prensa');