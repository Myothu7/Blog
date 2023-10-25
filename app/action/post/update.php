<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../../vendor/autoload.php');
use App\Database\PostTable;
use App\Database\MySQL;
use App\Auth\Http;

$post = new PostTable(new MySQL());
$result = $post->update($_POST, $_FILES);

if($result){
    Http::redirect('admin/post/index.php','update=1');
}