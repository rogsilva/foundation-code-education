<?php
if(!isset($_SESSION))
    session_start();

if(!isset($_SESSION['user']) || $_SESSION['user']['logado'] != 1)
    header('location: /admin/login');

include_once "./includes/pdo.php";
include_once "./includes/functions.php";


$id = segment(2);

if($id != NULL){
    $stmt = $conexao->prepare("SELECT * FROM produtos WHERE id = :id ");
    $stmt->bindValue("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_OBJ);

    if(!$produto)
        header('location: /admin/produtos');
}



if(isset($_POST['save'])){
    $postId = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    if(isset($_POST['id']) && $_POST['id'] != ''){
        switch($_POST['action']){
            case 'update':
                $stmt = $conexao->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao WHERE id = :id ");
                $stmt->bindValue('nome', $nome, PDO::PARAM_STR);
                $stmt->bindValue('descricao', $descricao, PDO::PARAM_STR);
                $stmt->bindValue('id', $postId, PDO::PARAM_INT);
                break;
            case 'delete';
                $stmt = $conexao->prepare("DELETE FROM produtos WHERE id = :id ");
                $stmt->bindValue('id', $postId, PDO::PARAM_INT);
                break;
        }
        try{
            $stmt->execute();
            header('location: /admin/produtos');
        }catch (PDOException $e){
            print 'Erro ao executar a ação: '.$e->getMessage();
        }
    } else {
        $stmt = $conexao->prepare("INSERT INTO produtos (nome, descricao) VALUES (:nome, :descricao)");
        $stmt->bindValue('nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue('descricao', $descricao, PDO::PARAM_STR);
        try{
            $stmt->execute();
            header('location: /admin/produtos');
        }catch (PDOException $e){
            print 'Erro ao executar a ação: '.$e->getMessage();
        }
    }
}

//Seleciona os dados da tabela
$stmt = $conexao->prepare("SELECT * FROM produtos ORDER BY id DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
$listResult = "";
foreach($result as $row){
    $listResult.="
                    <tr>
                        <td>{$row->id}</td>
                        <td>{$row->nome}</td>
                        <td><a href=\"/admin/produtos/{$row->id}\" class=\"btn btn-info btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a></td>
                    </tr>
                ";
}


?>


<?php include_once 'menu.php'?>
<div class="row">
    <div class="col-lg-12">
        <h1>Painel administrativo Produtos</h1>
    </div>
</div>
<div class="row">

    <div class="col-lg-4">
        <form action="/admin/produtos" role="form" class="form-horizontal" method="post">
            <?php if($id):?>
            <div class="form-group">
                <label>Ação</label>
                <select class="form-control" name="action">
                    <option value="update">Editar</option>
                    <option value="delete">Remover</option>
                </select>
            </div>
            <?php endif;?>
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome" value="<?php echo ($id != NULL)? $produto->nome : '';?>">
                <input class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea id="ckeditor" class="form-control" name="descricao"><?php echo ($id != NULL)? $produto->descricao : '';?></textarea>
            </div>
            <input type="submit" class="btn btn-success" value="Salvar" name="save">
        </form>
    </div>

    <div class="col-lg-8">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th><i class="glyphicon glyphicon-edit"></i> Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $listResult;?>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>

</div>

<!--Load CKEditor-->
<script src="<?php echo "http://".$_SERVER['HTTP_HOST']?>/js/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('ckeditor');
    });
</script>