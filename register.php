<?php 
include 'init.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On'); 
$username = sanitize($_POST['USERNAME']);
$password = sanitize($_POST['PASSWORD']);
$REPEATPASSWORD = $_POST['REPEATPASSWORD'];
$password = md5($password);
$users = sanitize("users");
//$email = sanitize($_POST['EMAIL']);
$con = mysqli_connect('localhost','root','root','placepic');
//$sqlInsert="INSERT INTO 'website.'$users(user_id,username,password,first_name,last_name,email,active) VALUES (NULL,$username,$password,$first_name,$last_name,$email,0)";
$sqlInsert= "INSERT INTO `placepic`.`users` (`user_id`, `username`, `password`, `email`, `privacy`) VALUES (NULL, '$username', '$password','12345', '1')";
mysqli_query($con,$sqlInsert);
mysqli_close($con);
include 'redirect_index.php';
?>
