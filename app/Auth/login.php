<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../vendor/autoload.php');

use App\Database\MySQL;
use App\Database\UserTable;
use App\Auth\Http;

$login = new UserTable(new MySQL());
$check = $login->auth($_POST['email'], md5($_POST['password']));

if ($check) {
    Http::redirect("admin/user/index.php");
}else{
    Http::redirect("admin/user/login.php","error=1");
}