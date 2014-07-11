<?php
include_once "./includes/pdo.php";
include_once "./includes/fixtures.php";

createFixtures($conexao);

if(!isset($_POST))
    header("location: home");

$busca = '%'.$_POST['busca'].'%';
$stmt = $conexao->prepare("(SELECT *, 'servicos' as tabela FROM servicos WHERE nome LIKE :busca OR descricao LIKE :busca)
                            UNION
                            (SELECT *, 'produtos' as tabela FROM produtos WHERE nome LIKE :busca OR descricao LIKE :busca)
                            ORDER BY id");
$stmt->bindValue('busca', $busca);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_OBJ);

$resultados = "";
foreach($result as $linha){
    $page = substr($linha->tabela, 0 , -1);
    $resultados.="
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <a href=\"$page/$linha->id\" class=\"text-justify\">
                                    <p>$linha->nome</p>
                                    <p>$linha->descricao</p>
                                </a>
                            </div>
                        </div>
                        ";
}

deleteFixtures($conexao);
$conexao = null;
?>

<h1 class="page-header">Resultados da Busca</h1>

<?php echo $resultados;?>
        