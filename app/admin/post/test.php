<?php 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 
include('../../../vendor/autoload.php');

use App\Database\MySQL;
use App\Database\PostTable;

$post = new PostTable(new MySQL());
$data = $post->edit($_GET['id']);

