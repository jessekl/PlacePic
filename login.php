
<?php 
include 'init.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On'); 
if(empty($_POST['USERNAME']) ===true || empty($_POST['PASSWORD']) === true){
	$errors[] = 'Username or password was not entered';
}
else if (user_exists($_POST['USERNAME'])===false) {
	$errors[] = 'Username does not exist';
}
else {
	$login = login($_POST['USERNAME'],$_POST['PASSWORD']);
	if($login === false)
		$errors[] = 'username or password incorrect';
	else{
	$_SESSION['user_id'] = $login; 	
	include 'redirect.php';	
	exit();
	}
}
print_r($errors);
?>
