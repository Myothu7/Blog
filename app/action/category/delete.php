<?php 
include('../../../vendor/autoload.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Database\MySQL;
use App\Database\CategoryTable;
use App\Auth\Http;

$category = new CategoryTable(new MySQL());
$data = $category->delete($_GET['id']);

if ($data) {    
    Http::redirect("admin/category/index.php","success");
}

