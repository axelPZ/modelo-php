<?php

require_once('models/user.php');

class UserController {

    public $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    //FUNCIONES

    // llamar a todos los usuarios
    public function getAll(){

        require_once('views/user/allUsers.php');
    }

    // llamar al usuario y enviarlo al formulario para editarlo
    public function getUserEdit(){

        $id = trim($_REQUEST['id']);
        $infoUser = $this->model->getById( $id );
        require_once('views/user/formUser.php');
    }

    // ir al formulario para agregar usuario
    public function formAdd(){
        $infoUser = new UserModel();
        require_once('views/user/formUser.php');
    }

    // llamar al usuario por id
    public function getUser( $id ){
        $user = new UserModel();
        return $user->getById( $id );
    }

    // funcion para editar al ausuario
    public function saveUpdate(){
        
        $User = new UserModel();
        $id = trim($_REQUEST['id']);

        ( $id ) ?  $User->usr_id = $id : $User->usr_pass = trim( $_REQUEST['pass'] );
        
        $User->usr_name = trim( strtoupper( $_REQUEST['name'] ) );
        $User->usr_surname = trim( strtoupper( $_REQUEST['surname'] ) );
        $User->usr_email = trim( strtoupper( $_REQUEST['email'] ) );
        $User->usr_type = trim( strtoupper( $_REQUEST['type'] ) );

        $respuesta = ( $id ) ? $User->update() :  $User->add();
        
        if( $respuesta ){
            require_once('views/user/allUsers.php');
        }else{
            echo 'error';
            die();
        }
    }

    // eliminar ( cambiar de estado ) al usuario
    public function delete(){
        
        $user = new UserModel();
        $id = trim( $_REQUEST['id']);

        if( $user->delete( $id ) ){
            require_once('views/user/allUsers.php');
        }else{
            echo "<h1>ERROr </h1>";
            die();
        }

        
    }

}

?>