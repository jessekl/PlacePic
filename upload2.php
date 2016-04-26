<?php 
include 'init.php';
$var= $_POST['address'];
if(isset($_FILES['pic']) === true){
  if(empty($_FILES['pic']['name'])===true){
    echo 'please choose a pic!';
  }
  else {
    $allowed = array('jpg','jpeg','gif','png');
    $file_name = $_FILES['pic']['name'];
    //checking extension
    $file_extn = strtolower(end(explode('.', $file_name))); 
    $file_temp = $_FILES['pic']['tmp_name'];
    //$_FILES['pic']['size'] to limit file size
    if(in_array($file_extn, $allowed)===true){
      upload_pic($the_user_id ,$file_temp,$file_extn,$var);
    }
    else{ 
      //incorrect file type
      echo 'Incorrect file type. Only ';
      echo implode(', ', $allowed);
      echo ' are allowed';
    }
  }
}
?>