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
<nav>
       <table>
            <tr>
                <td><img src="images/logoo.png" height="40px"></td>
                <td><a href="bookingreq.php">Home</a></td>
                <td><a href="clients.php">Clients</a></td>
                <td><a href="booking.php">Bookings</a></td>
                <td><form action="search.php" method="post">
                <i class="fas fa-search"></i>
                <input type="search" name="txtSearch">
                <input type="submit" name="submit" value="Go">
                </form></td>
            </tr>
        </table>
    </nav>
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
    if(array_key_exists('go', $_GET)){
        echo "New booking was created!";
    }
    
  ?>
    <!creating footer with links to different pages>
    <div>
    <footer id="footer" style="position: absolute; bottom:0; width: 100%"> <nav>
       <table>
            <tr>
                <td><img src="images/logoo.png" height="40px"></td>
                <td><a href="aboutus.php">About Us</a></td>
                <td><a href="#######">FAQs</a></td>
                <td><a href="#######">Legal</a></td>
                <td><a href="#######">Terms & Conditions</a></td>
            </tr>
        </table>
    </nav>
</footer>
    </div>
</body>
</html>