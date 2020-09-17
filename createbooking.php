<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("raiders.php"); 
           return true;
        } 
        else {
          window.location.reload(); //stays on the same page
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
                <td><a href="bookingreq.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
                <td><a href="booking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td><form action="search.php" method="post">
                <i class="fas fa-search"></i>
                <input type="search" name="txtSearch">
                <input type="submit" name="submit" value="Go">
                </form>
                <td><div>                 
                <form action = "post" class = "Logout">
                <input type="submit" name="submit" value="Logout" onclick="logOut();">
                 </form>
                </div></td>
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
        <tr><td><label for="date">Departure Date:</label></td>
        <td><input type="text" id="date" name="date" placeholder="Departure Date"></td></tr>
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
    $date = $_REQUEST['date'];


     // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}lst

$sql = "INSERT INTO bookings (bookingID, startDate, endDate, numberPassengers, initialCollectionPoint, clientID, driverID)
 VALUES ($name, $surname, $email, $contact, $startDepot, $destinationDepot, $passengers,$date);"


if ($conn->query($sql) === TRUE) {
  echo "Booking created successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
  ?>

 <!-- general footer code  -->
 <div class="footer"> 
  <nav>
    <table>
        <tr>
            <td><a href="aboutus.php">About Us</a></td>
            <td><a href="#######">FAQs</a></td>
            <td><a href="#######">Legal</a></td>
            <td><a href="#######">Terms & Conditions</a></td>
        </tr>
    </table>
  </nav>
</div>    

</body>
</html>