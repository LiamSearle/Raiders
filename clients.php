<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clients</title>
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
          <td><a class="active" href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
          <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
          <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
          <td>
            <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
          </td>      
      </tr>
  </table> 
  </div> 

<h2 id="clientHeader">Client ID:
<input type="text" name="clientID" id="clientID">
<input type="submit" name="submit" value="Search"></h2>
 
<fieldset style="margin: auto; width: 50%;">
<legend>Booking ID: <?php $_REQUEST['id']; ?></legend>

<form action="adminNewBookingPage.php" method="POST">
  <table id="clientTable" style="margin: auto; width: 50%;">
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
          <tr> 
          <td></td></tr>   
      </table>
      <button type="submit" name="go" style="margin: auto; width: 15%; padding: 10px;">Confirm Details</button>
    </form>
    <br>
    <form action="" method="POST">
      <!-- Sends a message to the client informing them the details they have entered are incorrect. -->
      <button type="submit" style="margin: auto; width: 15%; padding: 10px;">Reject Details</button>
    </form>
    
</fieldset>

 
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