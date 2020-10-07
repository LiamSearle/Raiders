<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php

// Check for the existence of longitude and latitude in our POST request
if (isset($_POST['longitude']) && isset($_POST['latitude'])) 
{
	require_once('config.php');
  // Cast variables to float 
  $longitude = (float) $_POST['longitudes'];
  $latitude = (float) $_POST['latitudes'];
  // Set the timestamp from the current system time
  $time = time();
   $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                or die("could not connect");
  // Insert query into DB
  $query = "INSERT INTO markers SET
  'longitude' = {$longitude}, 
  'latitude' = {$latitude},
  'time' = {$time}";
//execute the query 
$result = mysqli_query($conn, $query)
or die ("Error submitting location details");
//let the user know the result of the action
echo "<strong style= \"color:Red\">Location created successfully</strong>";
//close the database
mysqli_close($conn);
header("Location:driver.php");
?>
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
	var latitudes = position.coords.latitude,
		longitudes = position.coords.longitude,
		coordinatess = latitudes + ',' + longitudes;
		document.getElementById('google_map').setAttribute('src', 'https://maps.google.co.za/?q=' + coordinatess + '&z=60&output=embed');
}
var errors = function(error)
{
	if(error.code === 1)
	alert('location not found');
}
document.getElementById('get_location').onclick = function()
{
	navigator.geolocation.getCurrentPosition(location, errors,
	{enableHighAccuracy: true,
	timeout: 15});
	
	return false;
}
</script>  
</body>
</html>