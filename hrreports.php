<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/logoo.png" type="image" sizes="100x100">
  <title>Reports</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

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
</head>

<body>

<!-- general navigation bar code   -->
<div class="nav">
 <table>
      <tr>
          <td><img src="images/logoo.png" height="50px"></td>
          <td><a class="active" href="hrreports.php"><i class="fas fa-list"></i> Reports</a></td>
          <td>
            <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
          </td>      
      </tr>
  </table> 
</div> 

<!-- creating the tab section  -->
<div class="tab">
  <button class="tablinks" onclick="openReport(event, 'Drivers')" id="defaultOpen">Drivers</button>
  <button class="tablinks" onclick="openReport(event, 'Vehicles')">Vehicles</button>
  <button class="tablinks" onclick="openReport(event, 'Location')">Location</button>
</div>

<!-- drivers tab -->
<div id="Drivers" class="tabcontent">
<fieldset style="margin: auto; width: 100%;">

<!-- navigation bar on drivers tab -->
<div class="nav">
    <table>
                <tr>
                 <td>
                  
                  <i class="fas fa-search"></i><input type="text" id="search" name="search" placeholder="Driver ID">
                  <input type="submit" name="search" value="Search">
                  
                  </td>
                </tr>
    </table>
</div>

<!-- populating the drivers table with php -->
<form action="hrreports.php" method="POST">
<?php

require_once("config.php");
  
if(isset($_REQUEST['submit'])){
  /* establish the connection to the database */
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
      or die("there was an error connecting to the database.");

  /* define the query */
    $search=$_REQUEST['search'];
    echo $search;
  //want it to be ordered by client ID asc
  $query = "SELECT * FROM driver WHERE driverID LIKE '%$search%'";
 

  /* get the results of the query and put them into a variable */
  $result = mysqli_query($conn, $query)
          or die("There was an error executing the query.");


  while($row = mysqli_fetch_array($result)) {
    $bookingID=$row['bookingID'];
    $firstName=$row['firstName'];
    $lastName=$row['lastName'];
    $email=$row['emailAddress'];
    $contactNumber=$row['contactNumber'];
    $startDepot=$row['initialCollectionPoint'];
    $endDepot=$row['finalCollectionPoint'];
    $numberPassengers=$row['numberPassengers'];
    $departureDate=$row['endDate'];
  }

  /* close the connection */
  mysqli_close($conn);

}
//  /* import the config for the database */
//  require_once("config.php");

else{
 /* establish the connection to the database */
 $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
     or die("there was an error connecting to the database.");

 /* define the query */
 $query = "SELECT driver.driverID, driver.firstName, driver.lastName, driver.contactNumber, driverlicence.licenceCode
  FROM driver
  INNER JOIN driverlicence
  ON driverlicence.driverID = driver.driverID";
 

 /* get the results of the query and put them into a variable */
 $result = mysqli_query($conn, $query)
         or die("There was an error executing the query.");

  //creating drivers table
  echo "<table style=\" border: 1px solid black; width: 100%;\">
  <tr>
  <th> DriverID </th>
  <th> First Name </th>
  <th> Last Name </th>
  <th> Contact Number </th>
  <th> Licence Code </th>
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
     echo "</tr>";
   }

   echo "</table>";

      //close the connection
  mysqli_close($conn);
}

  ?>

</fieldset>
</div>    <!--end of drivers tab code -->


<!-- depot tab -->
<div id="Vehicles" class="tabcontent">
<fieldset style="margin: auto; width: 100%;">
<!-- navigation bar on drivers tab -->
  <div class="nav">
    <table>
                <tr>
                 <td><i class="fas fa-search"></i><input type="text" id="search" name="search" placeholder="Vehicle Registration No">
                  <input type="submit" name="search" value="Search"></td>

                </tr>
    </table>
</div>

<!-- write code for vehicle table -->
<form action="hrreports.php" method="POST">
<?php

 /* import the config for the database */
 require_once("config.php");

 /* establish the connection to the database */
 $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
     or die("there was an error connecting to the database.");

 /* define the query */
 $query = "SELECT vehicle.registrationNumber,vehicle.model,vehicle.make,vehicle.numberOfSeats,vehiclebooking.bookingID
            FROM vehicle
            INNER JOIN vehiclebooking ON vehiclebooking.registrationNumber=vehicle.registrationNumber";

 /* get the results of the query and put them into a variable */
 $result = mysqli_query($conn, $query)
         or die("There was an error executing the query.");



  //creating vehicles table
  echo "<table style=\" border: 1px solid black; width: 100%;\">
  <tr>
  <th> Registration No </th>
  <th> Model </th>
  <th> Make </th>
  <th> Number of Seats </th>
  <th> Booking ID </th>
  </tr>";
  
   //displaying data
   while($row=mysqli_fetch_array($result))
   {
     echo "<tr>";
     echo "<td>" . $row['registrationNumber'] . "</td>";
     echo "<td>" . $row['model'] . "</td>";
     echo "<td>" . $row['make'] .  "</td>";
     echo "<td>" . $row['numberOfSeats'] . "</td>"; 
     echo "<td>" . $row['bookingID'] .  "</td>";
     echo "</tr>";
   }

   echo "</table>";

      //close the connection
  mysqli_close($conn);

  ?>

  <!-- write code for vehicle table -->
<form action="hrreports.php" method="POST">
<?php

 /* import the config for the database */
 require_once("config.php");

 /* establish the connection to the database */
 $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
     or die("there was an error connecting to the database.");

 /* define the query */
 $query = "SELECT daytripdepot.startDepotID,daytripdepot.endDepotID
            FROM daytripdepot";

 /* get the results of the query and put them into a variable */
 $result = mysqli_query($conn, $query)
         or die("There was an error executing the query.");


  //creating location table
  echo "<table style=\" border: 1px solid black; width: 100%;\">
  <tr>
  <th> Initial Destination </th>
  <th> Final Destination </th>
  </tr>";
  
   //displaying data
   while($row=mysqli_fetch_array($result))
   {
     echo "<tr>";
     echo "<td>" . $row['startDepotID'] . "</td>";
     echo "<td>" . $row['endDepotID'] . "</td>";
     echo "</tr>";
   }
   echo "</table>";

      //close the connection
  mysqli_close($conn);

  ?>

</fieldset>
</div> <!-- end of vehicle tab code -->

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
            <td><a href="help.php">Help</a> | </td>
            <td><a href="faq.php">FAQs</a> | </td>
            <td><a href="legal.php">Legal</a> | </td>
            <td>&copy; Copyright 2020 Raiders</td>

        </tr>
    </table>
  </nav>
</div>

</body>
</html>