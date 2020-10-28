<!DOCTYPE html>
<html>
<head>
<title>Access Google Map API in PHP</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/googlemap.js"></script>
<style type="text/css">
	.container {
		height: 450px;
	}
	#map {
		width: 1000px;
		height: 1000px;
		border: 1px solid blue;
	}
</style>
</head>

<body>
	
	<div class="container">
		<center><h1>Access Google Maps API in PHP</h1></center>
		<div id="map"></div>
	</div>
</body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV3bqTsOWQovFrnXrFnANI_UY_cXLBYco&callback=loadMap">
</script>
</html>