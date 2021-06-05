
<?php require_once('views/system/menu.php')?>

<div class="listado-usuario sombra centrar-column">
    <div class="encabezado">
        <h1>Listado de Usuarios</h1>
        <hr>
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CORREO</th>
                <th>TIPO</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->model->getAll() as $user):?>
                <tr>
                    <td> <?php echo $user->usr_id; ?> </td>
                    <td> <?php echo $user->usr_name; ?> </td>
                    <td> <?php echo $user->usr_surname; ?> </td>
                    <td> <?php echo $user->usr_email; ?> </td>
                    <td> <?php echo $user->usr_type; ?> </td>
                    <td> <a href="index.php?controller=user&&action=getUserEdit&&id=<?php echo $user->usr_id ?>" class='btn-edit'>Editar</td>
                    <td> <a onclick="javascript:return confirm('Seguro desea eliminar este usuario')" href="index.php?controller=user&&action=delete&&id=<?php echo $user->usr_id ?>" class="btn-delete">Eliminar</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>