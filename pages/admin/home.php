<?php
if(!isset($_SESSION))
    session_start();

if(!isset($_SESSION['user']) || $_SESSION['user']['logado'] != 1)
    header('location: /admin/login');


?>


<?php include_once 'menu.php'?>
<div class="row">
    <div class="col-lg-12">
        <h1>Painel administrativo Home</h1>
    </div>
</div>

