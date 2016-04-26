<?php 
include 'init.php';
  $the_id = sanitize($the_user_id);
  $con = mysqli_connect('localhost','root','root','placepic') or die($connectError);
  $sql="SELECT * FROM `pictures` where ('$the_id' = user_id)";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $the_data = $row['coordinates'];
  $the_data = explode(" ", $the_data);
  $the_data = str_replace("(", "", $the_data);
  $the_data = str_replace(")", "", $the_data);
  $the_data = str_replace(",", "", $the_data);
  mysqli_close($con); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Info windows</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script >
// This example displays a marker at the center of Australia.
// When the user clicks the marker, an info window opens.
var xdata = <?php echo json_encode($the_data); ?>;
var lat = xdata[0].toString();
var log = xdata[1].toString();
var myloc = lat.concat(log);
console.log(lat);
console.log (log);
console.log(myloc);
function initialize() {
  var myLatlng = new google.maps.LatLng(0,0);
  var mapOptions = {
    zoom: 2,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+'</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var myLatlng = new google.maps.LatLng(lat,log);
  
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Uluru (Ayers Rock)'});

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);});

}
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>