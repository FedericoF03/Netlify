<?php 
    $users_controller = new UsersController();
    if($_POST['r'] == 'user-delete' && $_SESSION['role_u'] == 'Admin' && !isset($_POST['crud'])) {
       $user = $users_controller->get($_POST['user']);
       if(empty($user)) {
        $template = '
                    <div class="container">
                        <p class="item error">No existe el Usuario: <b>%s</b></p>
                    </div>
                    <script> window.onload = function () { reloadPage("status");}</script>';
        printf($template, $_POST['user']);
       } else {

        $template_user = '
                    <h2 class="p1">Eliminar Usuario</h2>
                    <form method="POST" class="item">
                        <div class="p1 f2">
                            <h3>Estas seguro de eliminar el Usuario:</h3>
                            <b class="p1">%s</b>?
                        </div>
                        <div class="p_25">
                            <input type="submit" class="button delete" name="status" value="SI">
                            <input type="button" class="button add" name="status" value="NO" onclick="history.back()">
                            <input type="hidden" name="r" value="user-delete">
                            <input type="hidden" name="crud" value="del">
                            <input type="hidden" name="user" value="%s">
                        </div>
                    </form>';
        
        printf($template_user,
            $user[0]['user_u'],
            $user[0]['user_u']);
       }
    } else if ($_POST['r'] == 'user-delete' && $_SESSION['role_u'] == 'Admin' && $_POST['crud'] == 'del') {
        var_dump($_POST);
        $user = $users_controller->del($_POST['user']);
        $template = '
                    <div class="container">
                        <p class="item delete">Usuario <b>%s</b> fue eliminado</p>
                    </div>
                    <script>
                    window.onload = function () { reloadPage("users");}
                    </script>
                    ';
                    
        printf($template, $_POST['user']);
    } else {
        $controller = new ViewController();
        $controller->load_view('error401');
         
    }
    

?>

