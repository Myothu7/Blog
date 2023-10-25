<?php 
namespace App\Auth;

class Auth
{
    public static function check()
    {
        session_start();
        // print_r($_SESSION);
        if(isset($_SESSION["auth"])){
            if($_SESSION["auth"]["user_type"] == 'user'){
                Http::redirect('frontend/post/index.php');
            }
        }else{
            Http::redirect('admin/user/login.php');
        }
        
    }
  

} 