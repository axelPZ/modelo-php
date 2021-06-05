<?php 

require_once('core/crud.php');

class UserModel extends Crud {

    private $usr_id;
    private $usr_name;
    private $usr_surname;
    private $usr_email;
    private $usr_image;
    private $usr_type;
    private $usr_pass;
    private $usr_estado;
    protected const TABLE='USERS';
    protected const IDCOLUMN='usr_id'; 
    protected $pdo;

    public function __construct(){
        parent::__construct( self::TABLE, self::IDCOLUMN );
        $this->pdo = parent::connectionDB();
    }

    //get and seter
    public function __set($name, $value){

        $this->$name=$value;
    }
    public function __get($name){

        return $this->$name;
    }

    //FUNCIONES

    //funcion para agregar
    public function add(){

        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (usr_name, usr_surname, usr_email, usr_type, usr_password) VALUES(?,?,?,?,?)");
            $stm->execute(array($this->usr_name,$this->usr_surname,$this->usr_email, $this->usr_type, $this->usr_pass));
            return true;

        }catch(PDOException $e){

            echo $e->getMessage();
            return false;
        }
    }
    public function update(){
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET usr_name=?, usr_surname=?, usr_email=?, usr_type=? WHERE usr_id=?");
            $stm->execute(array($this->usr_name,$this->usr_surname,$this->usr_email, $this->usr_type, $this->usr_id));
            return true;
            
        }catch(PDOException $e){

            echo $e->getMessage();
            return false;

        }
    }
    public function updateStatus(){}

}

?>