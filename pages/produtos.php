<?php
    include_once "./includes/pdo.php";


    $stmt = $conexao->prepare("SELECT * FROM produtos");
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

    $i = 1;
    $produtos = "";
    foreach($result as $produto){
        $produtos.="
                    <div class=\"col-md-3 portfolio-item\">
                        <a href=\"produto/$produto->id\">
                            <img class=\"img-responsive\" src=\"http://placehold.it/750x450\">
                        </a>
                    </div>
                    ";
        if($i % 4 == 0){
            $produtos.="
                    \r\t\t</div>
                    \r\t\t<div class=\"row\">";
        }
        $i++;
    }


    $conexao = null;
?>

        <h1 class="page-header">Produtos</h1>
        <div class="row">
            <?php echo $produtos; ?>
        </div>