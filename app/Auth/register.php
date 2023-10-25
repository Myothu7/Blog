<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../vendor/autoload.php');

use App\Database\MySQL;
use App\Database\UserTable;
use App\Auth\Http;
$date = date('Y-m-d');
$login = new UserTable(new MySQL());

$user_data = [':name'=> $_POST['name'], ':email'=> $_POST['email'], ':password'=>md5($_POST['password']), ':user_type' =>$_POST['user_type'],':create_at'=>$date];
if($login->create($user_data)) 
{
    Http::redirect('admin/user/register.php','success=1');
}
