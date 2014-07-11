<?php
ini_set('display_errors', 'on');

include_once "includes/functions.php";


$arrayRoutes = array(
    'home',
    'contato',
    'empresa',
    'produto',
    'produtos',
    'servico',
    'servicos',
    'busca'
);


include_once 'includes/head.php';
include_once 'includes/navbar.php';

if( segment(0) != '' ){
    if (file_exists("pages/" . segment(0) . ".php") && in_array( segment(0), $arrayRoutes )){
        include_once "pages/" . segment(0) . ".php";
    } else {
        include_once 'pages/ops.php';
        header("HTTP/1.0 404 Not Found");
        //http_response_code(404);
    }
}else{
    include_once 'pages/home.php';
}

include_once 'includes/footer.php';

