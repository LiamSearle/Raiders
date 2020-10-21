<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<script>
	function getGeoLocation()
	{
		if(navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(onSuccess, onError);        
		}
	else {
			console.log('Not Supported');
		}
	}
 
 
	function onSuccess(position){
    // const {latitude, longitude} = position.coords;
    const {latitude, longitude} = {
        latitude: '34.6283864',
        longitude: '27.2516951'
    };
    
    const url = `https://www.google.co.za/maps/?lat=${latitude}&amp;long=${longitude}`;
 
    document.querySelector('a').setAttribute('href', url);
    document.querySelector('div').style.display = 'block';
}
 
function onError(error){
    console.log(error);
}
	</script>
</head>

<body>
    <button onclick="getGeoLocation()">Find My Location</button>
    <br><br>
    <div style="display:none;">
        <a href="#">Click Here</a>
    </div>
 
</body>
</html>