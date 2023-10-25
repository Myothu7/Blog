<?php
namespace App\Database;
use Exception;
use PDO;
use PDOException;
class UserTable{
    private $db;
    public function __construct($db){
        $this->db = $db->connect();
    }

    public function users_table(){
      var_dump($this->db);
    }

    public function create($data) {
        try {
            $query = "INSERT INTO users(name,email,password,user_type,create_at) 
                    VALUES(:name,:email,:password,:user_type,:create_at)";
                    
            $insert = $this->db->prepare($query);
            $insert->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            return $e->getMessage()."##".$e->getLine();
        }
    }

    public function edit($id)
    {
        
        try {
            $edit = "SELECT * FROM users WHERE id = $id";
            $user = $this->db->query($edit);
            $data = $user->fetch();
          
            return $data;

        }catch(PDOException $e){
            return $e->getMessage()."".$e->getLine();
        }   
    }

    public function update($data)
     {
        $id = $data["id"];
        $name = $data["name"];
        $email = $data["email"];
        $user_type = $data["user_type"];
        try{
            $update = "UPDATE users SET name= '$name', email = '$email', user_type = '$user_type' WHERE id= $id";
            $result = $this->db->query($update);
            
            if($result){
                return 1;
            }else{
                return 0;
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function view(){
        try{
            $read = "SELECT * FROM users";
            $result = $this->db->query($read)->fetchAll();
            return $result;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function delete($id) {
        try{
            $delete = "DELETE FROM users WHERE id= $id";
            $delete = $this->db->exec($delete);
            
            return $delete;  // return 1 or 0
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function auth(string $email , string $password) 
    {
        try{
            $find = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = $this->db->query($find)->fetch();

            return $result ?? false;
            
        }catch(PDOException $e){
            return "Err: ".$e->getMessage();
        }
    }

    public function delete_table(){
        $delete = "TRUNCATE TABLE users";
        $this->db->query($delete);
    }
}

?>