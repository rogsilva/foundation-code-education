<?php

function segment ($route){
    $path = explode('/', $route['path']);
    if($path[0] == '')
        unset($path[0]);

    $segments = array_values($path);
    return $segments;
}


$route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$segment = segment($route);



include_once 'includes/head.php';
include_once 'includes/navbar.php';

if($segment[0] != ''){
    if (file_exists("pages/{$segment[0]}.php")){
        include_once "pages/{$segment[0]}.php";
    } else {
        include_once 'pages/ops.php';
        header("HTTP/1.0 404 Not Found");
        //http_response_code(404);
    }
}else{
    include_once 'pages/home.php';
}

include_once 'includes/footer.php';

