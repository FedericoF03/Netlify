<?php 

print('<h2 class="p1">Gestion de Movie and Series</h2>');

$ms_controller = new MovieSeriesController();
$ms = $ms_controller->get();

if(empty($ms)) {
    print(  '<div class="container">
                <p class="item error">No hay Peliculas o series</p>
            </div>'        
);
} else {
    $template_ms = '
    <div class="item">
    <table>
        <tr>
            <th>IMDB ID</th>
            <th>Titulo</th>
            <th>Estreno</th>
            <th>Generos</th>
            <th>Status</th>
            <th>Categoria</th>
            <th colspan="3">
                <form action="" method="post">
                    <input type="hidden" name="r" value="movieserie-add">
                    <input type="submit" class="button add" value="agregar">
                </form>
            </th>
        </tr>';

        for ($n = 0; $n < count($ms); $n++) {
            $template_ms .= '
            <tr>
                <td>'.$ms[$n]['imdb_id'].'</td>
                <td>'.$ms[$n]['title'].'</td>
                <td>'.$ms[$n]['premiere'].'</td>
                <td>'.$ms[$n]['genres'].'</td>
                <td>'.$ms[$n]['status'].'</td>
                <td>'.$ms[$n]['category'].'</td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="r" value="movieserie-show">
                        <input type="hidden" name="imdb_id" value="'.$ms[$n]['imdb_id'].'">
                        <input type="submit" class="button show" value="Mostrar">
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="r" value="movieserie-edit">
                        <input type="hidden" name="imdb_id" value="'.$ms[$n]['imdb_id'].'">
                        <input type="submit" class="button edit" value="Editar">
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="r" value="movieserie-delete">
                        <input type="hidden" name="imdb_id" value="'.$ms[$n]['imdb_id'].'">
                        <input type="submit" class="button delete" value="Eliminar">
                    </form>
                </td>
            </tr>
            ';
}
     
    $template_ms .= ' 
    </table>
</div>
';
printf($template_ms);
}
?>