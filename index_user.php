<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyABosCoQXayrL4w58lhOz5K3rZaj0D2A3s",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 76fe8076-3bb1-3df0-d893-a365ba4d5542"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  $obj = json_decode($response, true);
  echo $obj['location'];
}
 
?>

<html>
	<head>
	<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 50%; }
    </style>
	<title>Ma première carte Google Maps</title>
	</head>

	<body class="bgSite">
		<div>
			<h1 class="TitleStyle">Bienvenue sur la page du client</h1>
		</div>
		<div id="map"></div>
    <script type="text/javascript">

	var map;
	function initMap() {
	  map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 39.898, lng: 116.408},
		zoom: 8
	  });
	}

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABosCoQXayrL4w58lhOz5K3rZaj0D2A3s&callback=initMap">
    </script>
	</body>


	<style>
		.bgSite {
			background-image: url("./mybg.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			min-height: 100%;
		}
		
		.TitleStyle {
			text-align: center;
			padding-top: 20px;
			padding-bottom: 20px;
			color: #fff;
		}    
		
	</style>
</html>