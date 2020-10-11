<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logoo.png" type="image/gif" sizes="100x100">
    <title>Create Booking</title>

    <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("clientlogin.php"); 
           return true;
        } 
        else {
          //stays on the same page
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
                <td><a href="clienthome.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
                <td><a href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td>
            <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
          </td>      
            </tr>
        </table>
</div>
  <fieldset>
  <h2>Enter booking details</h2>
    <form action="clientcreatebooking.php" method="POST">
  
   <table>
     <tr><td><label for="startdate">Start Date:</label></td>
    <td><input type="date" id="startdate" name="startdate" placeholder= "Start Date"></td></tr>
        <tr><td><label for="enddate">End Date:</label></td>
        <td><input type="date" id="enddate" name="enddate" placeholder="End Date"></td></tr>
        <tr><td><label for="numberPassengers">Number of Passengers:</label></td>
        <td><input type="text" id="numberPassengers" name="numberPassengers" placeholder="Number of Passengers"></td></tr>
        <tr><td><label for="collection">Initial Collection Point:</label></td>
        <td><input type="text" id="collection" name="collection" placeholder="Initial Collection Point"></td></tr>
        <tr><td> </td> 
        <td><input type="submit" name="submit" value="Add"></td></tr> 
        <td><a href="http://"></a></td> 
    </table>
    </form>
  </fieldset>

  <?php

 
  //checking if the searching form has been submitted 
  if (isset($_REQUEST['submit'])) {
      //get the value from the form
      require_once("config.php");
      $id = $_SESSION['clientID'];
      $startdate = $_REQUEST['startdate'];
      $enddate = $_REQUEST['enddate'];
      $passengers =$_REQUEST['numberPassengers'];
      $collectionpoint = $_REQUEST['collection'];
      // Create connection
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("Error connecting to the database");

  //issue the query to insert details to the database
  $query = "INSERT INTO bookings (startDate, endDate, numberOfPassengers, initialCollectionPoint, clientID) 
            VALUES ('$startdate', '$enddate', '$passengers', '$collectionpoint', '$id')";

  //execute the query 
  $result = mysqli_query($conn, $query)
  or die ("Error adding booking details");
  //close the database
  mysqli_close($conn);
  header("Location:bookingmessage.php");
  
}

  ?>

 <!-- general footer code  -->
 <div class="footer"> 
  <nav>
    <table>
        <tr>
        <td><a href="clientaboutus.php">About Us</a> | </td>
            <td><a href="clienthelp.php">Help</a> | </td>
            <td><a href="clientfaq.php">FAQs</a> | </td>
            <td><a href="clientlegal.php">Legal</a> | </td>
            <td><a href="clientterms.php">Terms & Conditions</a></td>
            <td>&copy; Copyright 2020 Raiders</td>
        </tr>
    </table>
  </nav>
</div>    

</body>
</html>