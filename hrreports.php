<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/logoo.png" type="image" sizes="100x100">
  <title>Admin Reports</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">

  <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("hrlogin.php"); 
           return true;
        } 
        else {
           return false;
        }
     } 

</script>
 <!-- location button code -->
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
	//fixed south african coordinates
	function onSuccess(position)
	{
		const {latitude, longitude} = 
		{ 
			latitude: '34.6283864',
			longitude: '27.2516951'
		};
		const url = `https://www.google.co.za/maps/?lat=${latitude}&amp;long=${longitude}`;
    window.location.href = url;
		document.querySelector('a').setAttribute('href', url);
		document.querySelector('div').style.display = 'block';
	}
 
	function onError(error)
	{
		console.log(error);
	}
	</script>
</head>

<body>

<!-- general navigation bar code   -->
<div class="nav">
 <table>
      <tr>
          <td><img src="images/logoo.png" height="50px"></td>
          <td><a class="active" href="hrreports.php"><i class="fas fa-list"></i> Reports</a></td>
          <td>
                    <div style = "position:relative; left:1550px; top:2px;">
                        <form action="hrlogin.php" class="Logout">
                        <input type="button" name="submit" value="Logout" onclick="logOut();">
                        </form>
                    </div>
        </td>    
      </tr>
  </table> 
</div> 


    <!-- creating the tab section  -->
    <div class="tab">
      <button class="tablinks" onclick="openReport(event, 'Drivers')" id="defaultOpen">Drivers</button>
      <button class="tablinks" onclick="openReport(event, 'Vehicles')">Vehicles</button>
    </div>

<!-- drivers tab -->
<div id="Drivers" class="tabcontent">



<fieldset style="margin: auto; width: 100%;">
<form action="hrreports.php" method="POST">

<!-- populating the table with php -->


<?php

require_once("config.php");
  
// if(isset($_REQUEST['submit'])){
 /* establish the connection to the database */
 $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
     or die("there was an error connecting to the database.");

 /* define the query */
 $query = "SELECT driver.driverID, driver.firstName, driver.lastName, driver.contactNumber, driverlicence.licenceCode 
 FROM driver 
 INNER JOIN driverlicence ON driverlicence.driverID = driver.driverID ORDER BY driver.driverID ASC";

 /* get the results of the query and put them into a variable */
 $result = mysqli_query($conn, $query)
         or die("There was an error executing the query.");

  //creating table
  echo "<table style=\" border: 1px solid black; width: 100%;\">
  <tr style = \"background-color: grey; font-weight: bold;\">
  <th> DriverID </th>
  <th> First Name </th>
  <th> Last Name </th>
  <th> Contact Number </th>
  <th> Licence Code </th>
  <th>Location</th>
  </tr>";
  
   //displaying data
   while($row=mysqli_fetch_array($result))
   {
     echo "<tr>";
     echo "<td>" . $row['driverID'] . "</td>";
     echo "<td>" . $row['firstName'] . "</td>";
     echo "<td>" . $row['lastName'] .  "</td>";
     echo "<td>" . $row['contactNumber'] . "</td>";
     echo "<td>" . $row['licenceCode'] ."</td>";

    //  echo "<td>" . "<a href=\"book.php?id=" . $row['board_id'] . "\"><input type=\"button\" value=\"Rent\"></a>" . "</td>";

    //"<a href=\"\"><input type=\"button\" onclick=\"getGeoLocation()\" value=\"Find My Location\"></a>" . 

    echo "<td>" . "<input type=\"button\" onclick=\"getGeoLocation()\" value=\"Find My Location\">" . 
    "<div style=\"display:none;\"><a href=\"#\">Click Here></a></div>" . "</td>";
    //  echo "</td>";
  	 echo "</tr>";
   }
	echo "</table>";
	//close the connection
	mysqli_close($conn);


  ?>



</fieldset>
</form>
</div>    

    <!-- vehicless tab -->
    <div id="Vehicles" class="tabcontent">
      <fieldset style="margin: auto; width: 100%;">

        <form action="hrreports.php" method="POST">
          <?php

          /* import the config for the database */
          require_once("config.php");

          /* establish the connection to the database */
          $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
            or die("there was an error connecting to the database.");

          /* define the query */
          $query = "SELECT * FROM vehicle ORDER BY numberOfSeats ASC";

          /* get the results of the query and put them into a variable */
          $result = mysqli_query($conn, $query)
            or die("There was an error executing the query.");



          //creating bookings table
          echo "<table style=\" border: 1px solid black; width: 100%;\">
                <tr style = \"background-color: grey; font-weight: bold;\">
                <th> Registration Number </th>
                <th> Make </th>
                <th> Model </th>
                <th> Seats </th>
                <th> Licence Code </th>
                </tr>";

          //displaying data
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['registrationNumber'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] .  "</td>";
            echo "<td>" . $row['numberOfSeats'] . "</td>";
            echo "<td>" . $row['licenceCode'] .  "</td>";
            echo "</tr>";
          }

          echo "</table>";

          //close the connection
          mysqli_close($conn);

          ?>
                </form>
      </fieldset>
    </div>
  </div>

  <!-- javascript code to control the tabs  -->
  <script>
    function openReport(evt, report) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(report).style.display = "block";
      evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>


 <!-- general footer code  -->
 <div class="footer"> 
  <nav>
    <table>
        <tr>
        <td><a href="aboutus.php">About Us</a> | </td>
            <td><a href="faq.php">FAQs</a> | </td>
            <td><a href="legal.php">Legal</a> | </td>
            <td>&copy; Copyright 2020 Raiders</td>

        </tr>
    </table>
  </nav>
</div>

</body>
</html>