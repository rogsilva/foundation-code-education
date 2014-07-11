<?php
include_once "./includes/pdo.php";
include_once "./includes/functions.php";
include_once "./includes/fixtures.php";

createFixtures($conexao);

$id = segment(1);

$stmt = $conexao->prepare("SELECT * FROM servicos WHERE id = :id");
$stmt->bindValue("id", $id);
$stmt->execute();
$servico = $stmt->fetch(\PDO::FETCH_OBJ);


deleteFixtures($conexao);
$conexao = null;
?>

<h1 class="page-header"><?php echo $servico->nome;?></h1>

<p><?php echo $servico->descricao;?></p>
        