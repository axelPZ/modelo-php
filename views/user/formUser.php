
<?php require_once('views/system/menu.php')?>


<div class="formulario centrar-column sombra">

<h1><?php echo ( !$infoUser->usr_id ) ? 'GUARDAR' : "EDITAR"; ?> USUARIO </h1>

    <form action="index.php?controller=user&&action=saveUpdate" method="POST" class="centrar-column">
        <input type="hidden" name='id' value="<?php echo ( $infoUser->usr_id ) ? $infoUser->usr_id : '' ?>">

        <div class="caja">
            <input type="text" name='name' value="<?php echo $infoUser->usr_name ?>" placeholder="Nombre:"/>
        </div>

        <div class="caja">
            <input type="text" name='surname'  value="<?php echo $infoUser->usr_surname; ?>" placeholder="Apellido:"/>
        </div>
 
        <div class="caja">
            <input type="email" name='email' value="<?php echo $infoUser->usr_email; ?>" placeholder="Correo:"/>
        </div>

        <?php if( !$infoUser->usr_id ):?>
            <div class="caja">
                <input type="password" name='pass' value="<?php echo $infoUser->usr_pass; ?>" placeholder="contrasenia"/>
            </div>
        <?php endif; ?>

        <div class="caja">
            <select name="type" >
                <option <?php echo $infoUser->usr_estado=='A' ? 'Selected' : '';?> value="A">Usario</option>
                <option <?php echo $infoUser->usr_estado=='B' ? 'Selected' : '';?> value="B">Adminstrador</option>
            </select>
        </div>
        <button type="submit" name='guardar' class="btn-save">Guardar Cambios</button>
    </form>
</div>