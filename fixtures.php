<?php
include_once "includes/pdo.php";

function createFixtures(\PDO $conexao){

    try{
        $stmt = $conexao->prepare(' CREATE TABLE IF NOT EXISTS produtos (
                                    id INT NOT NULL AUTO_INCREMENT,
                                    nome VARCHAR(100) NOT NULL,
                                    descricao TEXT NOT NULL,
                                    PRIMARY KEY (id))');
        $stmt->execute();

        $stmt = $conexao->prepare(' CREATE TABLE IF NOT EXISTS servicos (
                                    id INT NOT NULL AUTO_INCREMENT,
                                    nome VARCHAR(100) NOT NULL,
                                    descricao TEXT NOT NULL,
                                    PRIMARY KEY (id))');
        $stmt->execute();

        $stmt = $conexao->prepare(' CREATE TABLE IF NOT EXISTS usuarios (
                                    id INT NOT NULL AUTO_INCREMENT,
                                    username VARCHAR(20) NOT NULL,
                                    password VARCHAR(255) NOT NULL,
                                    PRIMARY KEY (id),
                                    UNIQUE INDEX username_UNIQUE (username ASC))');
        $stmt->execute();

        $pass = 'code@foundation';
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $conexao->exec("INSERT INTO usuarios (username, password) VALUES ('admin', '$password')");


        return true;
    }
    catch(PDOException $e){
        die("Erro: ". $e->getMessage());
    }

}

function deleteFixtures(\PDO $conexao){
    try{
        $stmt = $conexao->prepare("DROP TABLE produtos");
        $stmt->execute();

        $stmt = $conexao->prepare("DROP TABLE servicos");
        $stmt->execute();
    }
    catch(PDOException $e){
        die("Erro: ". $e->getMessage());
    }
}


createFixtures($conexao);

print '<a href="/home">Voltar ao site</a>';