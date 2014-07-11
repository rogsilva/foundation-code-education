<?php
    include_once "./includes/pdo.php";
    include_once "./includes/fixtures.php";

    createFixtures($conexao);

    $stmt = $conexao->prepare("SELECT * FROM servicos");
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

    $servicos = "";
    foreach($result as $servico){
        $servicos.="
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <a href=\"servico/$servico->id\" class=\"text-justify\">
                                    <img width=\"140\" class=\"img-responsive img-circle pull-left\" src=\"http://placehold.it/750x450\">
                                    <p>$servico->nome</p>
                                    <p>$servico->descricao</p>
                                </a>
                            </div>
                        </div>
                        ";
    }

    deleteFixtures($conexao);
    $conexao = null;
?>

        <h1 class="page-header">Serviços</h1>
        
        <?php echo $servicos;?>
        