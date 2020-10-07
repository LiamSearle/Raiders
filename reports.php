<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

  <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("raiders.php"); 
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
          <td><a href="adminhomepage.php"><i class="fas fa-home"></i>Home</a></td>
          <td><a href="adminclients.php"><i class="fas fa-user"></i> Clients</a></td>
          <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
          <td><a class="active" href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
          <td>
            <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
          </td>      
      </tr>
  </table> 
</div> 

<!-- creating the tab section  -->
<div class="tab">
  <button class="tablinks" onclick="openReport(event, 'Bookings')" id="defaultOpen">Bookings</button>
  <button class="tablinks" onclick="openReport(event, 'Drivers')">Drivers</button>
  <button class="tablinks" onclick="openReport(event, 'Vehicles')">Vehicles</button>
</div>

<!-- bookings tab -->
<div id="Bookings" class="tabcontent">
  <fieldset style="margin: auto; width: 100%;">

<!-- navigation bar on the bookings tab -->
<div class="nav">
    <table>
                <tr>
                <form action="reports.php" method="POST">
                 <td><i class="fas fa-search"></i><input type="text" id="search" name="search" placeholder="Booking ID">
                  <input type="submit" name="search" value="Search"></td></form>
                  <td><label for="groupBy"> Group By: </label>
                  <select id="selections" name="Select">
                    <option value="Departure Date" >Departure Date</option>
                    <option value="Start Date" >Start Depot</option>
                    <option value="End Date" >End Depot</option>
                </select></td>
                </tr>
    </table>
</div>

<?php
      require_once("config.php");
   /* establish the connection to the database */
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

      $bookingID = $_REQUEST['id'];
      $length = strlen($_POST['vehicle']);
      $registrationNo = substr($_POST['vehicle'], ($length - 10));
      
      echo "XXXXXX" . $bookingID . "<br>";
      echo "YYYYYY" . $registrationNo . "<br>";
      echo "ZZZZZZ" . $_POST['vehicle'] . "<br><br>";

      $vehicleBookingID= $bookingID . $registrationNo;
      
      echo "lmao" . $vehicleBookingID;

      /* define the query */
      $query = "INSERT INTO vehiclebooking(`vehicleBookingID`, `bookingNumber`, `registrationNumber`)
                VALUES ('$vehicleBookingID', '$bookingID', '$registrationNo')";

      /* get the results of the query and put them into a variable */
      $result = mysqli_query($conn, $query)
              or die("There was an error executing the query.");

      /* close the connection */
      mysqli_close($conn);

?>


<!-- populating the bookings table with php -->
<form action="reports.php" method="POST">
<?php

  //database credentials
  require_once("config.php");
  if(isset($_REQUEST['submit'])){
    // making connection
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("<strong style=\"color:red;\">There's been a glitch while trying to connect to our database!</strong>");

    $search=$_REQUEST['search'];
    //query instructions
    $query = "SELECT * FROM bookings INNER JOIN client ON client.clientID=bookings.clientID
    WHERE bookings.bookingID LIKE '%$search%'";
  
    $result=mysqli_query($conn,$query) 
    or  die("<strong style=\"color:red;\">There's been an error with our query!</strong>");
  
    //creating bookings table
     echo "<table style=\" border: 1px solid black;  width: 100%;\">
    <tr>
    <th> BookingID </th>
    <th> ClientID </th>
    <th> First Name </th>
    <th> Last Name </th>
    <th> Email </th>
    <th> Contact Number </th>
    <th> Start Depot </th>
    <th> Start Date </th>
    <th> No of Passengers </th>
    <th> Driver ID </th>
    <th> Vehicle Registration No </th>
    </tr>";
    
     //displaying data
     while($row=mysqli_fetch_array($result))
     {
       echo "<tr>";
       echo "<td>" . $row['bookingID'] . "</td>";
       echo "<td>" . $row['clientID'] . "</td>";
       echo "<td>" . $row['firstname'] . "</td>";
       echo "<td>" . $row['lastName'] .  "</td>";
       echo "<td>" . $row['emailAddress'] . "</td>";
       echo "<td>" . $row['contactNumber'] . "</td>";
       echo "<td>" . $row['initialCollectionPoint'] . "</td>";
       echo "<td>" . $row['startDate'] . "</td>";
       echo "<td>" . $row['numberPassengers'] . "</td>";
       echo "<td>" . $row['driverID'] . "</td>";
       echo "<td>" . $row['vehicleRegistration'] . "</td>";
       echo "</tr>";
     }
     echo "</table>";
  
     //close the connection
    mysqli_close($conn);
  }

  // making connection
  else{
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
  or die("<strong style=\"color:red;\">There's been a glitch while trying to connect to our database!</strong>");


  //query instructions
  $query="SELECT client.firstname,client.lastName,client.clientID,client.emailAddress,client.contactNumber,
  bookings.bookingID, bookings.startDate,bookings.endDate,bookings.numberPassengers,bookings.initialCollectionPoint, 
  bookings.finalCollectionPoint,vehiclebooking.registrationNumber, driver.driverID 
  FROM client 
  INNER JOIN bookings ON bookings.clientID=client.clientID 
  INNER JOIN driver ON driver.driverID=bookings.driverID 
  INNER JOIN vehiclebooking ON vehiclebooking.bookingNumber=bookings.bookingID";

  $result=mysqli_query($conn,$query) 
  or  die("<strong style=\"color:red;\">There's been an error with our query!</strong>");

  //creating bookings table
   echo "<table style=\" border: 1px solid black;  width: 100%;\">
  <tr>
  <th> BookingID </th>
  <th> ClientID </th>
  <th> Name </th>
  <th> Email </th>
  <th> Contact Number </th>
  <th> Start Location </th>
  <th> End Location </th>
  <th> Start Date </th>
  <th> No of Passengers </th>
  <th> DriverID </th>
  <th> Vehicle Registration No </th>
  </tr>";
  
   //displaying data
   while($row=mysqli_fetch_array($result))
   {
     echo "<tr>";
     echo "<td>" . $row['bookingID'] . "</td>";
     echo "<td>" . $row['clientID'] . "</td>";
     echo "<td>" . $row['firstname'] . " " . $row['lastName'] .  "</td>";
     echo "<td>" . $row['emailAddress'] . "</td>";
     echo "<td>" . $row['contactNumber'] . "</td>";
     echo "<td>" . $row['initialCollectionPoint'] . "</td>";
     echo "<td>" . $row['finalCollectionPoint'] . "</td>"; 
     echo "<td>" . $row['startDate'] . "</td>";
     echo "<td>" . $row['numberPassengers'] . "</td>";
     echo "<td>" . $row['driverID'] . "</td>";
     echo "<td>" . $row['registrationNumber'] . "</td>";
     echo "</tr>";
   }
   echo "</table>";

   //close the connection
  mysqli_close($conn);
  }
  ?>

</fieldset>
</div> <!-- end of booking tabs code -->

<!-- drivers tab -->
<div id="Drivers" class="tabcontent">
<fieldset style="margin: auto; width: 100%;">

<!-- navigation bar on drivers tab -->
<div class="nav">
    <table>
                <tr>
                 <td><i class="fas fa-search"></i><input type="text" id="search" name="search" placeholder="Driver ID">
                  <input type="submit" name="search" value="Search"></td>
                </tr>
    </table>
</div>

<!-- populating the drivers table with php -->
<form action="reports.php" method="POST">
<?php

 /* import the config for the database */
 require_once("config.php");

 /* establish the connection to the database */
 $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
     or die("there was an error connecting to the database.");

 /* define the query */
 $query = "SELECT * FROM driver";

 /* get the results of the query and put them into a variable */
 $result = mysqli_query($conn, $query)
         or die("There was an error executing the query.");



  //creating bookings table
  echo "<table style=\" border: 1px solid black; width: 100%;\">
  <tr>
  <th> DriverID </th>
  <th> First Name </th>
  <th> Last Name </th>
  <th> Contact Number </th>
  </tr>";
  
   //displaying data
   while($row=mysqli_fetch_array($result))
   {
     echo "<tr>";
     echo "<td>" . $row['driverID'] . "</td>";
     echo "<td>" . $row['firstName'] . "</td>";
     echo "<td>" . $row['lastName'] .  "</td>";
     echo "<td>" . $row['contactNumber'] . "</td>"; 
     echo "</tr>";
   }

   echo "</table>";

      //close the connection
  mysqli_close($conn);

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