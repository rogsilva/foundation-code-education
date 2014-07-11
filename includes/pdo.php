<?php


try{
    $host = "localhost";
    $database = "foundation";
    $user = "root";
    $password = "root";

    $conexao = new \PDO("mysql:host=$host;dbname=$database", $user, $password);
}
catch (\PDOException $e){
    die("Erro código: ". $e->getCode().": ".$e->getMessage());
}