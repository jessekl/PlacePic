<?php 
function upload_pic($user_id, $file_temp,$file_extn,$var){
	$file_path = 'images/'.substr(md5(time()), 0, 36).'.'.$file_extn; //10 character name
	move_uploaded_file($file_temp, $file_path);
	//move file path to database
	$con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
	$user_id = sanitize($user_id);
	$file_path = sanitize($file_path);
	$var = sanitize($var);
	$sqlInsert= "INSERT INTO `placepic`.`pictures` (`user_id`, `pic`, `coordinates`) VALUES ('$user_id', '$file_path','$var')";
	$result = mysqli_query($con,$sqlInsert);
	mysqli_close($con);
	include 'redirect.php';
	
}
function user_data($user_id){
	$con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
	$sql="SELECT * FROM users where (user_id = '$user_id[0]')";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	mysqli_close($con);	
	return $row;
	
}

function logged_in(){
	if(isset($SESSION['user_id']))
		return false;
	else 
		return true;
}
function user_exists($username){
	$con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
	$username = sanitize($username);
	$sql="SELECT * FROM (users) where (user_id >= 1)";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if($num > 0)
		return true;
	else 
		return false;
	mysqli_free_result($result);
	mysqli_close($con);

}

function user_id_from_username($username){
	$con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
	$username = sanitize($username);
	$sql="SELECT (user_id) FROM (users) where (username like '$username')";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$data[0]=$row['user_id'];
	$num = mysqli_num_rows($result);
	if($num > 0)
		return $data;
	else 
		return false;
	mysqli_free_result($result);
	mysqli_close($con);
}

function login ($username, $password){
	$user_id = user_id_from_username($username);
	$username=sanitize($username);
	$password = md5($password);
	$con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
	$username = sanitize($username);
	$sql="SELECT * FROM (users) where (username like '$username' and password like '$password')";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$data[0]=$row['user_id'];
	$num = mysqli_num_rows($result);
	if($num > 0)
		return $data;
	else 
		return false;
	mysqli_free_result($result);
	mysqli_close($con);
}
function sanitize ($data){
	$con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
	$data = mysqli_real_escape_string($con,$data);
	mysqli_close($con);
	return $data;
}
function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		echo $error, ', ';
	}
}

?>












