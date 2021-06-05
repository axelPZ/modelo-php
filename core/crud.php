<?php

require_once('connection.php');

abstract class Crud extends Connection{

    private $table;
    private $idColumn;
    private $db;

    public function __construct($table, $idColumn){
        $this->table = $table;
        $this->idColumn = $idColumn;
        $this->db = parent::connectionDB();
    }

    public function getAll(){
        try{

            $stm = $this->db->prepare("SELECT * FROM $this->table");
            $stm->execute();
            return $stm->feTchAll(PDO::FETCH_OBJ);

        }catch(PDOException $error){

            echo $error->getMessage();
            return false;
        }
    }

    public function getById( $id ){
        try{
            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE $this->idColumn=$id");
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);

        }catch(PDOException $error){

            echo $error->getMessage();
            return false;
        }
    }

    public function delete( $id ){
        try{

            $stm = $this->db->prepare("DELETE FROM $this->table WHERE $this->idColumn= '$id'");
            $stm->execute();

            return true;
        }catch(PDOException $error){

            echo $error->getMessage();
            return false;
        }
    }    
    abstract function update();
    abstract function add();
    abstract function updateStatus();
}
?>