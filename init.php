<?php 
session_start();
error_reporting(0);
require 'user_functions.php';
if(logged_in()===true){
$session_user_id = $_SESSION['user_id'];
$user_data = user_data($_SESSION['user_id']);
$the_user_id = $user_data['user_id'];
}
$errors = array();
?>