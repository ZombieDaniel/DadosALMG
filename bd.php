<?php

$db = new SQLite3('deputados.db');

$db->exec('CREATE TABLE IF NOT EXISTS deputados (
    idDeputado integer primary key not null, 
    nome varchar(200) not null
)');

$db->exec('CREATE TABLE IF NOT EXISTS verbas (
    idVerba integer primary key not null, 
    valor varchar(200) not null,
    mes varchar(30) not null,
    idDeputado integer not null,
    FOREIGN KEY(idDeputado) REFERENCES deputados(idDeputado)
)');

$db->exec('CREATE TABLE IF NOT EXISTS redeSocial (
    idRedeSocial integer primary key not null, 
    nome varchar(200) not null
)');



