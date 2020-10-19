<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <title>Depot Admin Home</title>

  <!-- logout button code -->
  <script>
    function logOut() {
      var retVal = confirm("Are you sure you'd like to log out?");
      if (retVal == true) {
        window.location = ("depotadminlogin.php");
        return true;
      } else {
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
        <td><a href="depotadminhome.php"><i class="fas fa-home"></i>Home</a></td>
        <td><a class="active" href="bedrequests.php"><i class="fas fa-bed"></i>Room Request</a></td>
        <td><a href="depotadminreports.php"><i class="fas fa-list"></i>Reports</a></td>
        <td>
          <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
        </td>
      </tr>
    </table>
  </div>

  <!-- populating the bed requests info -->
  <?php
  require_once("config.php");

  /* establish the connection to the database */
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("there was an error connecting to the database.");

  //want it to be ordered by client ID asc
  $query = "SELECT bookings.bookingID,bookings.endDate,bookings.finalCollectionPoint,bookings.driverID, 
         daytrip.tripNumber,daytripdepot.startDepotID,daytripdepot.endDepotID, driver.firstName,driver.lastName, depot.depotName,
         depot.numberBedsAvailable 
         FROM bookings 
         INNER JOIN daytrip ON daytrip.bookingID=bookings.bookingID 
         INNER JOIN driver ON driver.driverID=bookings.driverID 
         INNER JOIN daytripdepot ON daytripdepot.tripNumber=daytrip.tripNumber 
         INNER JOIN depot ON depot.depotID=daytripdepot.endDepotID";


  /* get the results of the query and put them into a variable */
  $result = mysqli_query($conn, $query)
    or die("There was an error executing the query.");


  while ($row = mysqli_fetch_array($result)) {
    $bookingID = $row['bookingID'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $endLocation = $row['finalCollectionPoint'];
    $endDate = $row['endDate'];
    $startDepotID = $row['startDepotID'];
    $endDepotID = $row['endDepotID'];
    $numberBedsAvailable = $row['numberBedsAvailable'];
    $tripNumber = $row['tripNumber'];
    $depotName = $row['depotName'];
  }

  /* close the connection */
  mysqli_close($conn);
  ?>

  <fieldset>
    <legend>Trip Number: <?php echo $tripNumber; ?></legend>
    <form action="depotadminreports.php?id=<?php echo $endDepotID; ?>" method="POST">
      <table id="bedRequestsTable" style="margin: auto; width: 50%;">
        <tr>
          <td><label for="firstName">First Name:</label></td>
          <td><input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="lastName">Last Name:</label></td>
          <td><input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="email">Departure Date:</label></td>
          <td><input type="text" id="endDate" name="endDate" value="<?php echo $endDate; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="endLocation">Arrival City:</label></td>
          <td><input type="text" id="endLocation" name="endLocation" value="<?php echo $endLocation; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="startDepot">Departure Depot:</label></td>
          <td><input type="text" id="startDepot" name="startDepot" value="<?php echo $startDepotID; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="endDepot">Arrival Depot:</label></td>
          <td><input type="text" id="endDepot" name="endDepot" value="<?php echo $endDepotID; ?>" readonly></td>
        </tr>
        <tr>
          <td><b><label for="numberBeds">Number of rooms available at <?php echo $depotName; ?> : <?php echo $numberBedsAvailable ?></label></b></td>
        </tr>
        <form action=depotadminreports.php method="POST">
          <tr>
            <td><input type="submit" name="confirmBed" value="Confirm Bed Request"></td>
          </tr>
        </form>

      </table>
  </fieldset>



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