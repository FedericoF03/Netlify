<?php 
require_once('./Controllers/Autoload.php');
$autoload = new Autoload();
$route = isset($_GET['r']) ? $_GET['r'] : 'home' ;  
$netfly = new Router($route);

?>