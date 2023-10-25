<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../vendor/autoload.php');

use App\Database\MySQL;
use App\Database\UserTable;
use App\Auth\Http;
use App\Auth\Auth;

$login = new UserTable(new MySQL());
$check = $login->auth($_POST['email'], md5($_POST['password']));

if ($check) {
    session_start();
    $_SESSION['auth'] = ['id'=>$check->id, 'name'=>$check->name, 'user_type'=> $check->user_type];
    if($check->user_type == "user"){
        Http::redirect('frontend/post/index.php');
    }else{
        Http::redirect('admin/user/index.php');
    }
}else{
    Http::redirect("admin/user/login.php","error=1");
}