<?php 
namespace App\Database;
use PDOException;
class CategoryTable 
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db->connect();
    }

    public function create($data) 
    {
        try{
            $query = "INSERT INTO `categories`(`name`, `description`, `create_at`)
                VALUES (:name,:description, :create_at)";           
                $insert = $this->db->prepare($query);
                $insert->execute($data);
                return $this->db->lastInsertId();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
    }

    public function index()
    {
        try{
            $category = "SELECT * FROM categories";
            $category = $this->db->query($category);
            return $category->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();  
        }
    }

    public function delete($id)
    {
        try{
            $delete = "DELETE FROM categories WHERE id = :id";
            $result = $this->db->prepare($delete);
            $result->execute([':id'=>$id]);
            return $result->rowCount();

        }catch(PDOException $e){
            echo $e->getMessage();
        }   
    }

    public function edit($id)
    {
        try{
            $edit = "SELECT * FROM categories WHERE id = $id";
            $result = $this->db->query($edit);
            return $result->fetch();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }  

    public function update($data)
    {   
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        
        try{
            $update = "UPDATE categories SET name='$name', description='$description' WHERE id = $id";
            $result = $this->db->query($update);
            
            if($result){
                return 1;
            }else{
                return 0;
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function find($id)
    {
        try{
            $edit = "SELECT id, name FROM categories WHERE id != $id";
            $result = $this->db->query($edit);
            return $result->fetchAll();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

   }

?>
