<?php

function segment ($number){
    $route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = explode('/', $route['path']);
    if($path[0] == '')
        unset($path[0]);

    $segments = array_values($path);
    return $segments[$number];
}
