<?php

require_once("config.php");

class Modelo{
    private $conn;

    public function __construct(){

        $this->conn=new mysqli(SRV,USR,PWD,DB);

        if($this->conn->connect_errno){
            echo "Fallo Mysql: ". $this->_db->connect_error();
            return;
        }

        $this->conn->set_charset(DB_CHARSET);
    }

    /*public function __destruct(){
        $this->conn->close();
    }*/

    public function consulta($sql){
        $aut=array();
        if($result=$this->conn->query($sql)){
            while($row=$result->fetch_array(MYSQLI_BOTH)){
                array_push($aut,$row);
            }
        }
        $result->free();
        $this->conn->close();
        return $aut;
    }
}

?>
