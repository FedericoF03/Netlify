<?php 
    $status_controller = new StatusController();
    if($_POST['r'] == 'status-delete' && $_SESSION['role_u'] == 'Admin' && !isset($_POST['crud'])) {
       $status = $status_controller->get($_POST['status_id']);
       if(empty($status)) {
        $template = '
                    <div class="container">
                        <p class="item error">No existe el status_id <b>%s</b></p>
                    </div>
                    <script> window.onload = function () { reloadPage("status");}</script>';
        printf($template, $_POST['status_id']);
       } else {
        
        $template_status = '
                    <h2 class="p1">Eliminar Status</h2>
                    <form method="POST" class="item">
                        <div class="p1 f2">
                            <h3>Estas seguro de eliminar el estatus:</h3>
                            <b class="p1">%s</b>?
                        </div>
                        <div class="p_25">
                            <input type="submit" class="button delete" name="status" value="SI">
                            <input type="button" class="button add" name="status" value="NO" onclick="history.back()">
                            <input type="hidden" name="r" value="status-delete">
                            <input type="hidden" name="crud" value="del">
                            <input type="hidden" name="status_id" value="%s">
                        </div>
                    </form>';
        
        printf($template_status,
            $status[0]['status'],
            $status[0]['status_id']);
       }
    } else if ($_POST['r'] == 'status-delete' && $_SESSION['role_u'] == 'Admin' && $_POST['crud'] == 'del') {
        
        
        $status = $status_controller->del($_POST['status_id']);
        $template = '
                    <div class="container">
                        <p class="item delete">Status <b>%s</b> fue eliminado</p>
                    </div>
                    <script>
                    window.onload = function () { reloadPage("status");}
                    </script>
                    ';
                    
        printf($template, $_POST['status_id']);
    } else {
        $controller = new ViewController();
        $controller->load_view('error401');
         
    }
    

?>

