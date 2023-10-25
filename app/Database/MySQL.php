<?php
namespace App\Database;
use PDO;
use PDOException;
class MySQL {
    private $host;
    private $db_name;
    private $username ;
    private $password ;
    private $db;
    public function __construct($host = "localhost", $db_name= "blog",$username= "root",$password= ""){
        $this->db = null;
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        try{
            $this->db = new PDO("mysql:dbhost=$this->host;dbname=$this->db_name",$this->username,$this->password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]);
            return $this->db;
    
        }catch (PDOException $e){
            echo "Error".$e->getMessage();
        }
    } 
}

?>