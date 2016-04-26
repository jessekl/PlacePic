  <?php 
include 'init.php';
  $the_id = sanitize($the_user_id);
  $con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
  $sql="SELECT * FROM `pictures` where ('$the_id' = user_id)";
  $result = mysqli_query($con,$sql);
  $the_data = array();
  $temp;

  $pics=array();
   while ($row = mysqli_fetch_assoc($result)) {
        $temp = $row['coordinates'];
        $pics[] = $row['pic'];
        $temp = explode(" ", $temp);
        $temp = str_replace("(", "", $temp);
        $temp = str_replace(")", "", $temp);
        $temp = str_replace(",", "", $temp);  
        $the_data[]= $temp;
    }
  mysqli_close($con); 
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
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"type="text/javascript"></script>
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
          <a class="navbar-brand" href="#"> <?php echo 'Hello '. $user_data['username'].'!'; ?></a> 
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
<div class = "container">
  <div class="jumbotron text-center">
    <h1><?php echo  $user_data['username'].'’s '; ?> Place Pic Map</h1>
 <div id="map" style="width: 1000px; height: 800px;"></div>
  <script type="text/javascript">
  var xdata = <?php echo json_encode($the_data); ?>;
  var picdata = <?php echo json_encode($pics); ?>;
  var username = <?php echo json_encode($user_data['username']);?>;
  console.log(picdata)
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 2,
      center: new google.maps.LatLng(0, 0),
      mapTypeId:google.maps.MapTypeId.SATILLITE
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    var contentString;
    var trafficLayer;
    for (i = 0; i < xdata.length; i++) { 
      infowindow = new google.maps.InfoWindow();
      marker = new google.maps.Marker({
      position: new google.maps.LatLng(xdata[i][0], xdata[i][1]),
      map: map
      });
      trafficLayer = new google.maps.TrafficLayer();
      trafficLayer.setMap(map);
      google.maps.event.addListener(marker, 'click', (function(marker, i) { return function() {
          infowindow.setContent('<div id="content">'+
      '<div id="siteNotice">'+'</div>'+
      '<h1 id="firstHeading" class="firstHeading">'+username+'’s Pic</h1>'+
      '<div id="bodyContent">'+
      '<p '+i+' /p>'+
      '<img src="'+picdata[i]+'"alt="" height="600" width="1000">'+
      '</p>'+
      '</div>'+
      '</div>');
          infowindow.open(map, marker);
        }})(marker, i));
      google.maps.event.addListener(marker, 'click', function() {
      map.setZoom(10);
      map.setCenter(marker.getPosition());
    });
    }
  </script>
  </div>
</div>
<!-- JUMBOTRON END -->
<!-- JUMBOTRON BEGIN -->
<div class = "container">
  <div class="jumbotron text-center">
    <h1> Friends Place Pic Map</h1>
   <div id="map2" style="width: 1000px; height: 800px;"></div>
    <script type="text/javascript">
  var xdata = <?php echo json_encode($the_data); ?>;
  var picdata = <?php echo json_encode($pics); ?>;
  var username = <?php echo json_encode($user_data['username']);?>;

    var map2 = new google.maps.Map(document.getElementById('map2'), {
      zoom: 2,
      center: new google.maps.LatLng(0, 0),
      mapTypeId:google.maps.MapTypeId.SATILLITE
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    var trafficLayer;
    for (i = 0; i < xdata.length; i++) { 
      marker = new google.maps.Marker({
      position: new google.maps.LatLng(xdata[i][0], xdata[i][1]),
      map: map2
      });
 trafficLayer = new google.maps.TrafficLayer();
      trafficLayer.setMap(map2);
      google.maps.event.addListener(marker, 'click', (function(marker, i) { return function() {
          infowindow.setContent('<div id="content">'+
      '<div id="siteNotice">'+'</div>'+
      '<h1 id="firstHeading" class="firstHeading">'+username+'’s Pic</h1>'+
      '<div id="bodyContent">'+
      '<p '+i+' /p>'+
      '<img src="'+picdata[i]+'"alt="" height="600" width="1000">'+
      '</p>'+
      '</div>'+
      '</div>');
          infowindow.open(map2, marker);
        }})(marker, i));
       google.maps.event.addListener(marker, 'click', function() {
      map2.setZoom(10);
      map2.setCenter(marker.getPosition());
    });
    }
  </script>
  </div>
</div>
<!-- JUMBOTRON END -->


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
</body>
</html>