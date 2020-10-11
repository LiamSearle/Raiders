<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<a href="#" id = "get_location">Get Location</a>
<div id = "map"> 
    <iframe id = "google_map" width = "425" height = "350" frameborder = "0" scrolling = "no" marginwidth = "0" 
			src = "https://maps.google.co.za?output=embed"> 
	</iframe>
</div>


<script>
//function to get dynamic user coordinates
var location = function(position)
{
	$.post("adminHR.php",
	{var latitudes = position.coords.latitude,
		longitudes = position.coords.longitude,
		coordinatess = latitudes + ',' + longitudes;
		document.getElementById('google_map').setAttribute('src', 'https://maps.google.co.za/?q=' + coordinatess + '&z=60&output=embed');
},
var errors = function(error)
{
	if(error.code === 1)
	alert('location not found');
},
var options = 
{
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0;
},
document.getElementById('get_location').onclick = function()
{
	navigator.geolocation.getCurrentPosition(location);
	return false;
});
}
</script>  
</body>
</html>