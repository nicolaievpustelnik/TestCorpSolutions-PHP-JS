drop database if exists CorpSolutions_db;
create database CorpSolutions_db;
use CorpSolutions_db;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE  usuarios (
	id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(15) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    ciudadFavorita VARCHAR(15)
);