<?php 
include 'init.php';
?>
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
   <style>
      html, body, #map-canvas {
        height: 0%;
        margin: 0px;
        padding: 0px
      }
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>
  
  
    </head>
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
<!-- JUMBOTRON BEGIN -->
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  
<div class = "container">
  <div class="jumbotron text-center">
    <h1>Go ahead <?php echo  $user_data['username']; ?> upload!</h1>
      <form class="form-horizontal" role="form" action="upload2.php" method="post" enctype="multipart/form-data"> 
              <div class="modal-header">          
             </div>
              <div class="modal-body">
                <div class="form-group">                  
                  <div class="col-sm-10">
                  	<div class ="input-group">
                    <input type="file" name="pic" class="form-control" >
                  </div>
                      <p> </p>
                        <p> </p>
                   <input id="address" name="address" type="textbox" placeholder="Enter the location where you took this awesome picture!" class="form-control"  >
                   <p> </p>
      			       <input type="button" value="Press me before uploading!" onclick="codeAddress()" class="btn btn-danger">
  	 			         <div id="map-canvas"></div>
                </div> <!--end of row -->       
              </div>
               <button type="submit" class="btn btn-primary">Upload</button>             
      </form>
  </div>
</div>
<!-- JUMBOTRON END -->
  <script>
var geocoder;
var map;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var mapOptions = {
    zoom: 8,
    center: latlng
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}
function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    document.getElementById('address').value = results[0].geometry.location;
   
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
    </script>

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
<!--
<form action ="" method="post" enctype="multipart/form-data">
<input type="file" name="pic"> <input type = "submit">
</form>-->
