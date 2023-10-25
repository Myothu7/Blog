<?php 

namespace App\Auth;
use Exception;
class Http 
{
    static $basic_url = "http://localhost/blog/app/";

    static function redirect($path,$msg = null)
    {
       try {
        $url = static::$basic_url.$path;

        if($msg) $url = $url."?$msg";

        echo $url;
        header("location:$url");
       } catch (Exception $e) {
            echo $e->getMessage();
       }
    
    }
}
