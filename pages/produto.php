<?php
include_once "./includes/pdo.php";
include_once "./includes/functions.php";


$id = segment(1);

$stmt = $conexao->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->bindValue("id", $id);
$stmt->execute();
$produto = $stmt->fetch(\PDO::FETCH_OBJ);



$conexao = null;
?>

<h1 class="page-header"><?php echo $produto->nome;?></h1>

<p><?php echo $produto->descricao;?></p>
        