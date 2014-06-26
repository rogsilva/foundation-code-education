
<?php 
include_once 'includes/head.php';
include_once 'includes/navbar.php';

if (!isset($_GET['page'])){
    
    include_once 'pages/home.php'; 
    
}  else {   
    
    if (file_exists("pages/{$_GET['page']}.php")){
        
        include_once "pages/{$_GET['page']}.php";
        
    } else {
        
        include_once 'pages/ops.php';
        
    }
    
}

include_once 'includes/footer.php';

