CREATE DATABASE campuslands;

USE campuslands;

create TABLE pais(
    idPais INT PRIMARY KEY AUTO_INCREMENT,
    nombrePais VARCHAR(50)
);

CREATE TABLE departamento(
    idDep INT PRIMARY KEY AUTO_INCREMENT,
    nombreDep VARCHAR(50),
    idPais INT,
    Foreign Key (idPais) REFERENCES pais(idPais)
)

CREATE TABLE region(
    idReg INT PRIMARY KEY AUTO_INCREMENT,
    nombreReg VARCHAR(50),
    idDep INT,
    Foreign Key (idDep) REFERENCES departamento(idDep)
)

CREATE TABLE campers(
    idCamper INT PRIMARY KEY AUTO_INCREMENT,
    nombreCamper VARCHAR(50),
    apellidoCamper VARCHAR(50),
    fechaNac DATE,
    idReg INT,
    Foreign Key (idReg) REFERENCES region(idReg)
)

SELECT c.idCamper,c.nombreCamper,c.apellidoCamper,c.fechaNac,r.nombreReg FROM campers c JOIN region r ON c.idReg = r.idReg