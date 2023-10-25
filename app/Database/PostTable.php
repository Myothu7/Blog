<?php 
namespace App\Database;
use PDOException;
class PostTable
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db->connect();
    }

    public function photo_save($photo)
    {
        $photo_name = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $type = $_FILES['photo']['type'];
        $photo_path = "../../image/$photo_name";

        if(file_exists($photo_path)){
            return $photo_name;
        }else{
            move_uploaded_file($tmp_name,$photo_path); 
            return $photo_name;
        }
    }

    public function create($data, $photo)
    {
        $date = date("Y-m-d H:i:s");
        $title = $data["title"];
        $content = $data["content"];
        $author_id = $data["author_id"];
        $category_id = $data["category_id"];
        $check = $this->photo_save($photo); // return photo name
        
        try{
            if($check)
            {
                $query = "INSERT INTO posts(title, content, author_id, category_id, photo, create_at)
                        VALUES (:title, :content, :author_id, :category_id, :photo, :create_at)";
                $post = $this->db->prepare($query);
                $data = [':title'=>$title, ':content'=>$content, ':author_id'=>$author_id,
                ':category_id'=>$category_id, ':photo'=>$check, ':create_at'=>$date  
                ];
                $result = $post->execute($data);

                return $this->db->lastInsertId();
            }
        }catch(PDOException $e){
            return $e->getMessage()."##".$e->getLine();
        }
                       
    }

    public function index()
    {
        try{
            $posts = "SELECT * FROM posts";
            $posts = $this->db->query($posts);
            return $posts->fetchAll();
        }catch(PDOException $e){
            return $e->getMessage()."".$e->getLine();
        }
    }

    public function photo_delete($id)
    {
        $photo = "SELECT photo FROM posts WHERE id = $id";
        $data = $this->db->query($photo)->fetch();

        $photo_path = "../../image/$data->photo";
        if(file_exists($photo_path)) {
            unlink($photo_path);
            
            return 1;
        }
    }

    public function delete($id)
    {
        try{
            $photo = $this->photo_delete($id);

            if($photo){
                $query = "DELETE FROM posts WHERE id = $id";
                $post = $this->db->exec($query);

                return $post;
            }
           
        }catch(PDOException $e){
            return $e->getMessage()."".$e->getLine();
        }
    }

    public function edit($id)
    {
        try{
            $edit = "SELECT posts.id, posts.title, posts.content, posts.photo,posts.author_id, posts.photo, categories.name AS category, 
                    categories.id AS category_id FROM `posts`
                    LEFT JOIN categories ON posts.category_id = categories.id 
                    WHERE posts.id = $id";
            $post = $this->db->query($edit)->fetch();
            
            return $post;

        }catch(PDOException $e){
            return $e->getMessage()."".$e->getLine();
        }    
    }

    public function update($data, $file)
    {
        $photo_check =  $file['photo']['error'];
        $id = $data['id'];
        $title = $data['title'];
        $content = $data['content'];
        $category_id = $data['category_id'];
        
        try{
            if($photo_check){
                $update = "UPDATE posts SET title='$title', content='$content', category_id='$category_id' WHERE id = $id";
               
            }
            else
            {
                $photo = $this->photo_save($file);
                $update = "UPDATE posts SET title='$title', content='$content', category_id='$category_id',photo= '$photo' WHERE id = $id";
               
            }

            $result = $this->db->query($update);      
            if($result){
                return 1;
            }else{
                return 0;
            }
        }catch(PDOException $e){
            return $e->getMessage()."".$e->getLine();   
        }
       

    }

    
}