<?php
if(!isset($_SESSION))
    session_start();


include_once "./includes/pdo.php";
include_once "./includes/functions.php";
$erro = false;

if(segment(2) == 'logout'){
    unset($_SESSION['user']);
}

if(isset($_POST['logar'])){
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE username = :user");
    $stmt->bindValue('user', $_POST['user']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if($result){
        if(password_verify($_POST['password'], $result->password)){
            $_SESSION['user'] = array(
                'logado' => true,
                'username'=> $result->username,
                'id'=> $result->id
            );

            header('location: /admin/home');
        }else{
            $erro = true;
        }
    }else{
        $erro = true;
    }

}

?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class=" panel panel-default" style="margin-top: 50%;">
            <div class="panel-heading">
                <h3 class="panel-title">Digite o nome de usuário e senha para entrar.</h3>
            </div>
            <div class="panel-body">
                <?php if ( $erro === true):?>
                <div class="alert alert-danger">
                    Usuário ou senha incorretos!
                </div>
                <?php endif;?>
                <form role="form" action="/admin/login" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Usuário" name="user" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Senha" name="password" type="password" value="">
                        </div>
                        <input type="submit" name="logar" class="btn btn-lg btn-success btn-block" value="Entrar">
                    </fieldset>
                </form>
            </div>
            <div class="panel-footer">
                <p>Usuário: admin</p>
                <p>Senha: code@foundation</p>
            </div>
        </div>
    </div>
</div>