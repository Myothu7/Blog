<?php 

include("../../../vendor/autoload.php");

use App\Database\MySQL;
use App\Database\PostTable;
use App\Auth\Auth;
$post = new PostTable(new MySQL());
$all_post = $post->view();