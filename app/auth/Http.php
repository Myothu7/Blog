<?php 

namespace App\Auth;

class Http 
{
    static $basic_url = "http://localhost/blog/app/";

    static function redirect($path,$msg = null)
    {
        $url = static::$basic_url.$path;

        if($msg) $url = $url."?$msg";

        header("location:$url");
        exit();
    }
}
