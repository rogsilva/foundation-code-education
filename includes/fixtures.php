<?php


function createFixtures(\PDO $conexao){

    try{
        $stmt = $conexao->prepare(' CREATE TABLE IF NOT EXISTS foundation.produtos (
                                    id INT NOT NULL AUTO_INCREMENT,
                                    nome VARCHAR(100) NOT NULL,
                                    descricao TEXT NOT NULL,
                                    PRIMARY KEY (id))');
        $stmt->execute();

        $stmt = $conexao->prepare(' CREATE TABLE IF NOT EXISTS foundation.servicos (
                                    id INT NOT NULL AUTO_INCREMENT,
                                    nome VARCHAR(100) NOT NULL,
                                    descricao TEXT NOT NULL,
                                    PRIMARY KEY (id))');
        $stmt->execute();


        for($i = 1; $i <= 10; $i++){

            $stmt = $conexao->prepare("INSERT INTO produtos (nome, descricao) VALUES ('Produto $i', 'Descrição do produto $i')");
            $stmt->execute();

            $stmt = $conexao->prepare("INSERT INTO servicos (nome, descricao) VALUES ('Serviço $i', 'Descrição do serviço $i')");
            $stmt->execute();

        }


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