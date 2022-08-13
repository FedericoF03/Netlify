<?php 

print('<h2 class="p1">Gestion de status</h2>');
$status_controller = new StatusController();
$status = $status_controller->get();

if(empty($status)) {
    print(  '<div class="container">
                <p class="item error">No hay Status</p>
            </div>'        
);
} else {
    $template_status = '
    <div class="item">
    <table>
        <tr>
            <th>Id</th>
            <th>Status</th>
            <th>
                <form action="" method="post">
                    <input type="hidden" name="r" value="status-add">
                    <input type="submit" class="button add" value="agregar">
                </form>
            </th>
        </tr>';

        for ($n = 0; $n < count($status); $n++) {
            $template_status .= '
            <tr>
                <td>'.$status[$n]['status_id'].'</td>
                <td>'.$status[$n]['status'].'</td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="r" value="status-edit">
                        <input type="hidden" name="status_id" value="'.$status[$n]['status_id'].'">
                        <input type="submit" class="button edit" value="Editar">
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="r" value="status-delete">
                        <input type="hidden" name="status_id" value="'.$status[$n]['status_id'].'">
                        <input type="submit" class="button delete" value="Eliminar">
                    </form>
                </td>
            </tr>
            ';
}
     
    $template_status .= ' 
    </table>
</div>
';
printf($template_status);

}
?>