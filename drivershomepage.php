<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driver Home Page</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

  <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("driverlogin.php"); 
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
                    <td><a class="active" href="drivershomepage.php"><i class="fas fa-home"></i>Home</a></td>
                    <td><a href="driversdepot.php"><i class="fas fa-bed"></i> Depot</a></td>
                    <td>
                        <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                    </td>
                </tr>
            </table>
</div>

<h2>Driver Schedule</h2>
<?php
        /* import the config for the database */
      require_once("config.php");

      $driverID=$_REQUEST['id'];

      /* establish the connection to the database */
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

      /* define the query */
      $query = "SELECT * FROM bookings 
                INNER JOIN driver ON driver.driverID=bookings.driverID WHERE driver.driverID='$driverID'";

      /* get the results of the query and put them into a variable */
      $result = mysqli_query($conn, $query)
              or die("There was an error executing the query.");


     ?>
<fieldset>
<?php
        echo "<table>
        <tr>
            <td></td>
        </tr>";
        
        
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . "Trip Number: "  . $row['bookingID'] .  "<br>".
            "Driver ID: " . $row['driverID'] . "<br>" .
            "Driver: " . $row['firstName']. " " . $row['lastName'] . "<br>" .
            "Departure Date: " . $row['startDate'] . "<br> " 
            . "From: " . $row['initialCollectionPoint'] . " -> " . $row['finalCollectionPoint'] .
             "</a>" . "</td>";
             $bookingID=$row['bookingID'];

        }
        echo "</table>";
        mysqli_close($conn);


?>
</fieldset>
<h2><a href="driversdepot.php?id=<?php echo $driverID; ?>"  >Book a Depot Room</a></h2>

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