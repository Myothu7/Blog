<?php 

include('../../vendor/autoload.php');
use App\Database\MySQL;
use App\Database\UserTable;
use App\Auth\Http;

$user = new UserTable(new MySQL());
$data = $user->delete($_GET['id']);

if($data) 
{
    Http::redirect("admin/user/index.php","delete=1");
}