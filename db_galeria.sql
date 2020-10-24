CREATE DATABASE db_galeria;
USE db_galeria;


CREATE TABLE usuario (

    id INT AUTO_INCREMENT,
    nickname varchar( 200 ) NOT NULL,
    pass varchar( 200 ) NOT NULL,
    passcrypt varchar( 200 ) NOT NULL,
    avatar VARCHAR( 200 ) NOT NULL,

    PRIMARY KEY ( id )

);

CREATE TABLE foto (

    id INT AUTO_INCREMENT,
    idUsuario INT NOT NULL,
    titulo varchar( 200 ) NOT NULL,
    img VARCHAR( 200 ) NOT NULL,
    descripcion TEXT NOT NULL,
    estado BOOLEAN NOT NULL,

    PRIMARY KEY ( id ),
    FOREIGN KEY ( idUsuario ) REFERENCES usuario ( id )

);