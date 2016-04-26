<?php include 'init.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Place A Pic</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> <!-- FOR cool ICONS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'><!-- For cool FONTS, for p TAGS-->
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'><!-- For cool FONTS, for all h TAGS-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <body>
    
<div class= "navbar navbar-default navbar-fixed-top" role = "navigation"> 
    <div class = "container">
      <div class = "navbar-header">
         <button type="button" class ="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
           <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> <?php echo 'Hello,'. $user_data['username'].'!'; ?></a> 
      </div>
       <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="home.php">Home</a></li>
           <li><a href="upload.php">Place A Pic</a></li>
           <li><a href="searchpic.php">Search A Pic</a></li>
           <li><a href="privacy.php">Privacy</a></li>
           <li><a href="logout.php">Logout</a></li>
      </div>
    </div>
  </div> 






  <!-- BEGIN OF Fixed FOOTER -->
  <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation"> <!--- black footer with navbar-inverse -->
      <div class="container">
        <div class="navbar-text pull-left">
          <p> ©Copywrite Jesse Lurie 2014</p>
        </div>
        <div class="navbar-text pull-right">
            <a href="#"><i class="fa fa-facebook-square fa-2x"></i> <!-- include facebook square and makes size bigger -->
            <a href="#"><i class="fa fa-google-plus fa-2x"></i>
            <a href="#"><i class="fa fa-twitter fa-2x"></i>
        </div>
      </div>
  </div> 
  <!-- END FOOTER-->

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
    </html>