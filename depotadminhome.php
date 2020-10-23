<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
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
        <td><a class="active" href="depotadminhome.php"><i class="fas fa-home"></i>Home</a></td>
        <td><a href="bedrequests.php"><i class="fas fa-bed"></i>Room Request</a></td>
        <td><a href="depotadminreports.php"><i class="fas fa-list"></i> Reports</a></td>
        <td>
          <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
        </td>
      </tr>
    </table>
  </div>

  <?php
  /* import the config for the database */
  require_once("config.php");

  /* establish the connection to the database */
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("there was an error connecting to the database.");

  /* define the query */
  $query = "SELECT daytrip.bookingID,daytrip.tripNumber,
      bookings.driverID,bookings.initialCollectionPoint,bookings.finalCollectionPoint, bookings.startDate,
      driver.firstName,driver.lastName,driver.requestStatus 
      FROM daytrip 
      INNER JOIN bookings ON bookings.bookingID=daytrip.bookingID 
      INNER JOIN driver ON driver.driverID=bookings.driverID
      ORDER BY daytrip.tripNumber DESC";

  /* get the results of the query and put them into a variable */
  $result = mysqli_query($conn, $query)
    or die("There was an error executing the query.");

  /* close the connection */
  mysqli_close($conn);
  ?>

  <h2>Incoming Bed Requests</h2>
  <fieldset style="margin: auto; width: 30%;">
    <?php
    echo "<table>
   <tr>
       <td></td>
   </tr>";

    while ($row = mysqli_fetch_array($result)) {
      if ($row['requestStatus'] == "Pending") {
      echo "<tr>";
      echo "<td>" . "Trip Number: " . "<a href=\"bedrequests.php?id=" . $row['tripNumber'] . "\">" .
        $row['tripNumber'] .  "<br>" .
        "Driver: " . $row['firstName'] . " " . $row['lastName'] . "<br>" .
        "Departure Date: " . $row['startDate'] . "<br>" .
        "From: " . $row['initialCollectionPoint'] . " ->  " . $row['finalCollectionPoint'] .
        "</a>" . "</td>";
      }
    }
    echo "</table>";
    ?>
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