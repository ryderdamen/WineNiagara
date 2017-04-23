<?php

header('Cache-Control: no-cache');
header('Pragma: no-cache');


$lines = file("./wineries.csv");
$winery = $lines[array_rand($lines)];
$winery = explode(",", $winery);
	$name = $winery[0];
	$municipality = $winery[1];
	$phonenumber = $winery[2];
	$url = $winery[3];
	$fulladdress = $winery[4];
	$long = $winery[5];
	$lat = $winery[6];
	
	# Building the google maps request
	include_once("api_keys.php");
	$mapembedurl = "https://www.google.com/maps/embed/v1/view?key={$apikeyGMAPS}&center={$lat},{$long}&zoom=15";
	
	# Building the suggestion part of the page
	$intro = array('How about something from', 'Maybe try something from', 'How about', 'Perhaps', 'You could try', 'Here\'s an idea:' );
	$i = rand(0, count($intro)-1); // generate random number size of the array
	$intro = "$intro[$i]";
	
	?>

<!doctype html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <title>Niagara Local Wineries</title>
  <meta name='description' content='A recommendation app for wineries in the Niagara Region'>
  <meta name='author' content='Ryder Damen'>
        <meta property='og:image' content='facebook.png'/>
  <link rel='stylesheet' href='style.css'>
  <script src='https://use.fontawesome.com/90425e6b8a.js'></script>
</head>

<body>

<div class='map' id='fade'>
<iframe
  width='100%'
  height='100%'
  frameborder='0' style='border:0'
  src='<?=$mapembedurl?>'>
</iframe></div>
<div class='mapcover'></div>


	<div class='header'>
	<p><a href='http://ryda.ca/niagarawine'>Home</a></p>
	</div>	

<div class='outer'>
  <div class='middle'>
    <div class='inner'>

		<h1><?=$intro?> <a href='<?=$url?>' target='_blank'><?=$name?></a>?</h1>
		<h2><i class='fa fa-location-arrow' aria-hidden='true'></i>
 <?=$municipality?> &nbsp; &nbsp; <i class='fa fa-phone' aria-hidden='true'></i>
 <a href="tel:<?=$phonenumber?>"><?=$phonenumber?></a></h2>
		<a href='http://maps.google.com/?q=<?=$fulladdress?>%20<?=$municipality?>%20Ontario' target='_blank'><p><i class='fa fa-map-marker' aria-hidden='true'></i> <?=$fulladdress?></p></a>
	
    </div>
    <a href= './wineries'id='checkagain'><i class='fa fa-refresh' aria-hidden='true'></i> Try Something Else</a>
  </div>
</div>



		
	<div class='footer'>
		<div class='footerinner'>
			<p>Designed by <a href='http://ryda.ca'>Ryder Damen</a> | Powered by <a href='https://niagaraopendata.ca'>Niagara Open Data</a> | <a href='https://www.behance.net/gallery/49669467/WineNiagara-Open-Data-Day-2017'>How It Works</a>
			</p>
		</div>
	</div>
	
<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script>
$(document).ready(function() {
     $('#fade').hide().fadeIn(3000);
    
});
  </script>
	
	
</body>
</html>

