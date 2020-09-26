<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client Booking</title>

    <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("raiders.php"); 
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
                <td><a href="homepage.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
                <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
                <td>
            <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
          </td>      
            </tr>
        </table>
</div>
  <fieldset>
  <h2>Enter booking details</h2>
    <form action="createbooking.php" method="GET">
    <!create a table >
   <table>
     <tr><td><label for="firstName">First Name:</label></td>
    <td><input type="text" id="firstName" name="firstName" placeholder= "First Name"></td></tr>
        <tr><td><label for="lastName">Last Name:</label></td>
        <td><input type="text" id="lastName" name="lastName" placeholder="Last Name"></td></tr>
        <tr><td><label for="email">Email:</label></td>
        <td><input type="text" id="email" name="email" placeholder="Email"></td></tr>
        <tr><td><label for="contactNumber">Contact Number:</label></td>
        <td><input type="text" id="contactNumber" name="contactNumber" placeholder="Contact Number"></td></tr>
        <tr><td><label for="startDepot">Start Location:</label></td>
        <td><input type="text" id="startDepot" name="startDepot" placeholder="Start Location"></td></tr>
        <tr><td><label for="destinationDepot">Destination:</label></td>
        <td><input type="text" id="destinationDepot" name="destinationDepot" placeholder="Destination"></td></tr>
        <tr><td><label for="numberPassengers">Number of Passengers:</label></td>
        <td><input type="text" id="numberPassengers" name="numberPassengers" placeholder="Number of Passengers"></td></tr>
        <tr><td><label for="ddate">Departure Date:</label></td>
        <td><input type="text" id="ddate" name="ddate" placeholder="Departure Date"></td></tr>
        <tr><td> </td> 
        <td><button type="submit" name="go">Add</button></td></tr>   
    </table>
    </form>
  </fieldset>

  <?php

require_once("config.php");
//checking if the searching form has been submitted 
if (isset($_REQUEST['submit'])) {
    //get the value from the form
    $name = $_REQUEST['firstName'];
    $surname = $_REQUEST['lastName'];
    $email =$_REQUEST['email'];
    $contact = $_REQUEST['contactNumber'];
    $startDepot = $_REQUEST['startDepot'];
    $destinationDepot = $_REQUEST['destinationDepot'];
    $passengers = $_REQUEST['numberPassengers'];
    $date = $_REQUEST['ddate'];


     // Create connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE)
  or die("Error connecting to the database");
}lst
//issue the query to insert details to the database
$query = "INSERT INTO clients(firstName, lastName, email, numberPassengers, ddate) VALUES ('$name', '$surname', '$email', '$passengers','$date')";

//execute the query 
$result = mysqli_query($conn, $$query)
or die ("Error adding booking details");

mysqli_close($conn);

echo "<strong style= \"color:Red\">New booking was created</strong>";
  ?>

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