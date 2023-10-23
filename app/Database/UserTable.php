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

    public function update($id) {
        try{
            $query = "UPDATE users SET 
            name=:name, password=:password, email=:email 
            WHERE id=:id ";
            $update = $this->db->prepare($query);
            $update->execute(['id'=>$id,'name'=>'khaing wai','password'=>'love','email'=>'khaingwai@gmail.com']);
            return "success";
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
            $delete = "DELETE FROM users WHERE id=$id";
            $this->db->query($delete);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function auth(string $email , string $password) 
    {
        try{
            $find = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'";
            $result = $this->db->query($find)->fetch();

            return $result->email ?? false;
            
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