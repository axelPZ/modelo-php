<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--estilos-->
    <link rel="stylesheet" href="css/styles.css">

    <title>prueba php</title>
</head>
<body>
    <div class="contenido centrar-column">
        <?php 
            if( !isset($_REQUEST['controller'] )){
                $controller = 'user';
                $action = 'getAll';

            }else{
                $controller = $_REQUEST['controller'];
                $action = $_REQUEST['action'];
            }

            require_once 'controllers/'.$controller.'_controller.php';
            $controller = ucwords($controller).'Controller';
            $controller = new $controller;
            call_user_func(array($controller, $action));
                
            ?>
    </div>
</body>
</html>