<?php
ini_set('display_errors', 'on');

include_once "includes/functions.php";


$routesDefault = array(
    'home',
    'contato',
    'empresa',
    'produto',
    'produtos',
    'servico',
    'servicos',
    'busca'
);
$routesAdmin = array(
    'home',
    'produtos',
    'servicos',
    'quemsomos',
    'login'
);

include_once 'includes/head.php';
include_once 'includes/navbar.php';

if(segment(0) != 'admin'){
        if( segment(0) != null ){
            if (file_exists("pages/" . segment(0) . ".php") && in_array( segment(0), $routesDefault )){
                include_once "pages/" . segment(0) . ".php";
            } else {
                include_once 'pages/ops.php';
                header("HTTP/1.0 404 Not Found");
                //http_response_code(404);
            }
        }else{
            include_once 'pages/home.php';
        }
}else{

    if(segment(1)){
        if (file_exists("pages/admin/" . segment(1) . ".php") && in_array( segment(1), $routesAdmin )){
            include_once "pages/admin/" . segment(1) . ".php";
        } else {
            include_once 'pages/ops.php';
            header("HTTP/1.0 404 Not Found");
            //http_response_code(404);
        }
    }else{
        include_once 'pages/admin/home.php';
    }

}
include_once 'includes/footer.php';

