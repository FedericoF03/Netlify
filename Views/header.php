<?php

print('
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Netfly</title>
        <meta name="description" content="Bienvenido a Netfly tus peliculas y series en una sola pagina" ></meta>
        <link rel="shortcut icon" href="Public/img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="Public/css/responsimple.min.css">
        <link rel="stylesheet" href="Public/css/netfly.css">
    </head>
<body>
    <header class="container  center  header">
        <div class="item  i-b  v-middle  ph12  lg2 lg-left">
            <h1 class="logo" ><a class="logo nobullet item inline" href="./">Netfly</a></h1>
        </div>');


if($_SESSION['ok']) {

    print('<nav class="item  i-b  v-middle ph12  lg10 lg-right  menu">
            <ul class="container">
                <li class="nobullet item inline"><a href="./">Inicio</a></li>
                <li class="nobullet item inline"><a href="movieseries">Moviseries</a></li>
                <li class="nobullet item inline"><a href="users">Usuarios</a></li>
                <li class="nobullet item inline"><a href="status">Status</a></li>
                <li class="nobullet item inline"><a href="salir">Salir</a></li>
            </ul>
        </nav>');
}
        
print('</header>
    <main class="container  center  main">');

?>