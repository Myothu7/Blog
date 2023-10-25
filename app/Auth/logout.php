<?php 
include("../../vendor/autoload.php");
use App\Auth\Http;

session_start();

unset($_SESSION["auth"]);
Http::redirect("admin/user/login.php");

?>