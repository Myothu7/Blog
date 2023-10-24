<?php 

include('../../vendor/autoload.php');
use App\Database\MySQL;
use App\Database\UserTable;
use App\Auth\Http;

$user = new UserTable(new MySQL());
$data = $user->update(['id'=>$_POST['id'],'name'=>$_POST['name'], 'email'=>$_POST['email'], 'user_type'=>$_POST['user_type']]);

if($data) 
{
    Http::redirect("admin/user/index.php","update=1");
}