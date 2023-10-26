<?php 
namespace App\Auth;

class Auth
{
    public static function check()
    {
        session_start();
        if(isset($_SESSION["auth"])){
            if($_SESSION["auth"]["user_type"] == 'user'){
                Http::redirect('frontend/post/index.php');
            }
        }else{
            Http::redirect('admin/user/login.php');
        } 
    }

    public static function role()
    {
        return $_SESSION["auth"]["user_type"];
        
    }

    public static function role_and_content_creater()
    {
        return [$_SESSION["auth"]["id"], $_SESSION["auth"]["user_type"]];
    }

    public static function name()
    {
        return $_SESSION["auth"]["name"];
    }

    public static function test()
    {
        echo "I am working";
    }

} 