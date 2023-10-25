<?php 
include('../../../vendor/autoload.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Database\MySQL;
use App\Database\CategoryTable;
use App\Auth\Http;

$name = $_POST['name'];
$description = $_POST['description'];
$id = $_POST['id'];
$category = new CategoryTable(new MySQL());
$data = $category->update(['name'=> $name, 'description'=> $description, 'id'=> $id]);

if($data){
    Http::redirect('admin/category/index.php','success=1');
}