<?php

$host = 'localhost';
$user = 'root';
$port = '3305';
$password = '';

try {
    // Conectar ao MySQL
    $pdo = new PDO("mysql:host=$host;port=$port", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar o banco de dados
    $sql = "CREATE DATABASE IF NOT EXISTS PAINELDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
    $pdo->exec($sql);
    $pdo->exec("USE PAINELDB;");


} catch (PDOException $e) {

}
try{

    // SQL para criar a tabela lojas
    $sql_lojas = "
        CREATE TABLE IF NOT EXISTS lojas (
            id_loja INT(11) NOT NULL AUTO_INCREMENT,
            nome_fantasia VARCHAR(255) NOT NULL,
            cnpj_cpf VARCHAR(14) NOT NULL,
            data_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            senha VARCHAR(255) NOT NULL,
            cargo varchar(255) DEFAULT 'admin',
            PRIMARY KEY (id_loja),
            UNIQUE KEY cnpj_cpf (cnpj_cpf)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ";
    $pdo->exec($sql_lojas);

    // SQL para criar a tabela usuarios
    $sql_usuarios = "
        CREATE TABLE IF NOT EXISTS usuarios (
            id_usuario INT(11) NOT NULL AUTO_INCREMENT,
            nome VARCHAR(255) NOT NULL,
            login VARCHAR(255) NOT NULL,
            senha VARCHAR(255) NOT NULL,
            cargo VARCHAR(30) DEFAULT 'funcionario',
            id_loja INT(11) NOT NULL,
            data_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id_usuario),
            KEY id_loja (id_loja),
            CONSTRAINT usuarios_ibfk_1 FOREIGN KEY (id_loja) REFERENCES lojas (id_loja)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ";
    $pdo->exec($sql_usuarios);

    // SQL para criar a tabela produtos
    $sql_produtos = "
        CREATE TABLE IF NOT EXISTS produtos (
            id_produto INT(11) NOT NULL AUTO_INCREMENT,
            data_time DATETIME DEFAULT NULL,
            foto_produto TEXT DEFAULT NULL,
            texto_do_produto TEXT DEFAULT NULL,
            id_usuario INT(11) DEFAULT NULL,
            id_loja INT(11) DEFAULT NULL,
            palavra_chave TEXT NOT NULL,
            PRIMARY KEY (id_produto),
            KEY id_usuario (id_usuario),
            KEY id_loja (id_loja),
            CONSTRAINT produtos_ibfk_2 FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario),
            CONSTRAINT produtos_ibfk_3 FOREIGN KEY (id_loja) REFERENCES lojas (id_loja)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ";
    $pdo->exec($sql_produtos);



   }   catch (PDOException $e) {
    echo $e->getMessage();

}?>