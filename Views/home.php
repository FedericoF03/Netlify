<?php 
$template = '
<div class="item">
    <h2 class="p1">Hola %s, bienvenido a Netlify!</h2>
    <h2 class="p1" >Tus peliculas y series favoritas en una pagina!</h2>
    <p class="p1 f1_25">Entraste con la cuenta rango %s</p>
</div>';

printf($template, $_SESSION['user_u'], $_SESSION['role_u']);
?>
