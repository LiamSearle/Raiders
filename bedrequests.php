<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <title>Depot Admin Requests</title>
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">

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
                    <div style = "position:relative; left:1300px; top:2px;">
                        <form action="depotadminlogin.php" class="Logout">
                        <input type="button" name="submit" value="Logout" onclick="logOut();">
                        </form>
                    </div>
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
  $query = "SELECT bookings.bookingID,bookings.endDate,bookings.initialCollectionPoint,bookings.finalCollectionPoint,bookings.driverID, 
         daytrip.tripNumber,daytripdepot.startDepotID,daytripdepot.endDepotID, driver.firstName,driver.lastName, depot.depotName,
         depot.numberBedsAvailable 
         FROM bookings 
         INNER JOIN daytrip ON daytrip.bookingID=bookings.bookingID 
         INNER JOIN driver ON driver.driverID=bookings.driverID 
         INNER JOIN daytripdepot ON daytripdepot.tripNumber=daytrip.tripNumber 
         INNER JOIN depot ON depot.depotID=daytripdepot.endDepotID
         WHERE daytrip.tripNumber=" . $_REQUEST['id'] . " ;";


  /* get the results of the query and put them into a variable */
  $result = mysqli_query($conn, $query)
    or die("There was an error executing the query.");


  while ($row = mysqli_fetch_array($result)) {
    $bookingID = $row['bookingID'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $startLocation = $row['initialCollectionPoint'];
    $endLocation = $row['finalCollectionPoint'];
    $endDate = $row['endDate'];
    $startDepotID = $row['startDepotID'];
    $endDepotID = $row['endDepotID'];
    $numberBedsAvailable = $row['numberBedsAvailable'];
    $tripNumber = $row['tripNumber'];
    $depotName = $row['depotName'];
    $driverID = $row['driverID'];
  }

  /* close the connection */
  mysqli_close($conn);
  ?>
  <div style = "position:relative; left:35px; top:50px;">
  <fieldset>
    <legend>Trip Number: <?php echo $tripNumber; ?></legend>
    <form method="POST">
      <table id="bedRequestsTable" style="margin: auto; width: 50%;">
      <tr>
          <td><label for="driverID">Driver ID:</label></td>
          <td><input type="text" id="driverID" name="driverID" value="<?php echo $driverID; ?>" readonly></td>
        </tr>
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
          <td><label for="endLocation">Departure City:</label></td>
          <td><input type="text" id="startLocation" name="startLocation" value="<?php echo $startLocation; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="endLocation">Arrival City:</label></td>
          <td><input type="text" id="endLocation" name="endLocation" value="<?php echo $endLocation; ?>" readonly></td>
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
            <td><input type="submit" name="confirmBed" value="Confirm"></td>
          </tr>
        </form>
        <form method="POST">
          <tr>
            <td><input type="submit" name="rejectBed" value="Reject"></td>
          </tr>
        </form>

      </table>
  </fieldset>
</div>

  <?php

  if (isset($_POST['confirmBed'])) {

    require_once("config.php");

    /* establish the connection to the database */
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
      or die("there was an error connecting to the database.");

    echo $driverID;
    /* define the query */
    $query = "UPDATE `driver` SET `requestStatus`='Confirmed' WHERE driverID = '$driverID'";

    /* get the results of the query and put them into a variable */
    $result = mysqli_query($conn, $query)
      or die("There was an error executing the query.");


    /* close the connection */
    mysqli_close($conn);
    header("Location:depotadminreports.php?id=$endDepotID");
    exit();
  }

  if(isset($_POST['rejectBed']))
  {
      require_once("config.php");

      /* establish the connection to the database */
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
      or die("there was an error connecting to the database.");

      /* define the query */
      $query = "UPDATE `driver` SET `requestStatus`='Denied' WHERE driverID ='$driverID'";

      /* get the results of the query and put them into a variable */
      $result = mysqli_query($conn, $query)
          or die("There was an error executing the query.");


      /* close the connection */
      mysqli_close($conn);
      header("Location:depotadminhome.php");
      exit();
  }
  ?>

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