<?php 
namespace App\User;
    class Validate 
    {
        private $name;
        private $email;
        private $password;

        public $db = [];

        public function __construct($name, $email, $password, $confirm_password)
        {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->confirm_password = $confirm_password;
            $this->check();
        }

        public function check()
        {
            if(empty($this->name)){
                array_push($this->db,'nameErr');
            }
            if(empty($this->email)){
                array_push($this->db,'emailErr');
            }
            if(empty($this->password)){
                array_push($this->db,'passwordErr');
            }
            if(empty($this->password)){
                array_push($this->db,'confrim_passwordErr');
            }
        }
    }

    if(isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
            header('location:../../auth/register.php');
        }else{
            $validate = new Validate($_POST['name'], $_POST['email'], $_POST['password'],$_POST['confirm_password']);
            $errr_msg = $validate->db;
            if(in_array('nameErr', $errr_msg)){
                $name_err = "Name is required";
            } 
            if(in_array('emailErr', $errr_msg)){
                $email_err = "Email is required";
            } 
            if(in_array('passwordErr', $errr_msg)){
                $password_err = "Password is required";
            } 
            if(in_array('confrim_passwordErr', $errr_msg)){
                $confirm_password_err = "Confirm password is required";
            } 
        }
       
    }
   
?>  