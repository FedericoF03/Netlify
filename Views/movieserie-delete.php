<?php 
    $ms_controller = new MovieSeriesController();
    if($_POST['r'] == 'movieserie-delete' && $_SESSION['role_u'] == 'Admin' && !isset($_POST['crud'])) {
       $ms = $ms_controller->get($_POST['imdb_id']);
       if(empty($ms)) {
        $template = '
                    <div class="container">
                        <p class="item error">No existe la MovieSerie <b>%s</b></p>
                    </div>
                    <script> window.onload = function () { reloadPage("movieseries");}</script>';
        printf($template, $_POST['imdb_id']);
       } else {

        $template_ms = '
                    <h2 class="p1">Eliminar MovieSerie</h2>
                    <form method="POST" class="item">
                        <div class="p1 f2">
                            <h3>Estas seguro de eliminar la MovieSerie:</h3>
                            <b class="p1">%s</b>?
                        </div>
                        <div class="p_25">
                            <input type="submit" class="button delete" name="status" value="SI">
                            <input type="button" class="button add" name="status" value="NO" onclick="history.back()">
                            <input type="hidden" name="imdb_id" value="%s">
                            <input type="hidden" name="r" value="movieserie-delete">
                            <input type="hidden" name="crud" value="del">
                        </div>
                    </form>';
        
        printf($template_ms,
            $ms[0]['title'],
            $ms[0]['imdb_id']);
       }
    } else if ($_POST['r'] == 'movieserie-delete' && $_SESSION['role_u'] == 'Admin' && $_POST['crud'] == 'del') {
        
        $ms = $ms_controller->del($_POST['imdb_id']);
        $template = '
                    <div class="container">
                        <p class="item delete">La MovieSerie <b>%s</b> fue eliminada</p>
                    </div>
                    <script>
                    window.onload = function () { reloadPage("movieseries");}
                    </script>
                    ';
                    
        printf($template, $_POST['imdb_id']);
    } else {
        $controller = new ViewController();
        $controller->load_view('error401');
         
    }
    

?>

