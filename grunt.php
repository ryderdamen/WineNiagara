





<?php

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

echo "<!doctype html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <title>Niagara Local Wineries</title>
  <meta name='description' content='A recommendation app for wineries in the Niagara Region'>
  <meta name='author' content='Ryder Damen'>
  <link rel='stylesheet' href='style.css'>
</head>

<body>
	<div class='header'>
		<p>Niagara, Ontario</p>
	</div>	

<div class='outer'>
  <div class='middle'>
    <div class='inner'>

		<h1>How about something from <a href='{$url}'>{$name}</a>?</h1>
		<h2>{$municipality} {$phonenumber}</h2>
		<p>{$fulladdress}</p>

    </div>
  </div>
</div>
		
	<div class='footer'>
		<div class='footerinner'>
			<p>Designed by <a href='https://ryda.ca'>Ryder Damen</a>, Powered by <a href='https://niagaraopendata.ca'>Niagara Open Data</a>
			</p>
		</div>
	</div>
</body>
</html>";


?>