<?php 

    if($_POST['r'] == 'user-add' && $_SESSION['role_u'] == 'Admin' && !isset($_POST['crud'])) {
        print(
            '
            <h2 class="p1">Agregar Usuario</h2>
            <form method="post" class="item">
                <div class="p_25">
                    <input type="text" name="user" placeholder="user" required>
                </div>
                <div class="p_25">
                    <input type="text" name="email" placeholder="email" required>
                </div>
                <div class="p_25">
                    <input type="text" name="name" placeholder="name" required>
                </div>
                <div class="p_25">
                    <input type="date" name="birthday" placeholder="birthday" required>
                </div>
                <div class="p_25">
                    <input type="text" name="pass" placeholder="pass" required>
                </div>
                <div class="p_25">
                    <input type="radio" name="role" id="admin" value="Admin" required>
                    <label for="admin">Administrador</label>
                    <input type="radio" name="role" id="noadmin" value="User" required>
                    <label for="noadmin">Usuario</label>
                </div>
                <div class="p_25">
                    <input type="submit" class="button add" value="Agregar">
                    <input type="hidden" name="r" value="user-add">
                    <input type="hidden" name="crud" value="set">
                </div>
            </form>
            '
        );

    } else if ($_POST['r'] == 'user-add' && $_SESSION['role_u'] == 'Admin' && $_POST['crud'] == 'set') {
        $users_controller = new UsersController();
        $new_user = array(
            'user_u'=> $_POST['user'],
            'email'=> $_POST['email'],
            'name_u'=> $_POST['name'],
            'birthday'=> $_POST['birthday'],
            'pass'=> $_POST['pass'],
            'role_u'=> $_POST['role'],
        );
        $users = $users_controller->set($new_user);
        $template = '
                    <div class="container">
                        <p class="item add">El usuario <b>%s</b> fue Salvado</p>
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

