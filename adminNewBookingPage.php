<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Bookings</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">

  <!-- logout button code -->
  <script>
    function logOut() {
      var retVal = confirm("Are you sure you'd like to log out?");
      if (retVal == true) {
        window.location = ("raiders.php");
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
        <td><a href="adminhomepage.php"><i class="fas fa-home"></i>Home</a></td>
        <td><a href="adminClients.php"><i class="fas fa-user"></i> Clients</a></td>
        <td><a class="active" href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
        <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
        <td>
          <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
        </td>
      </tr>
    </table>
  </div>

  <!-- creating and populating search on bookingID -->
  <form action="adminNewBookingPage.php" method="POST">
    <h2 id="bookingHeader">Booking ID:
      <input type="text" name="bookingID" id="bookingID">
      <input type="submit" name="submit" value="Search"></h2>

    <fieldset style="margin: auto; width: 70%;">


      <?php
      /* import the config for the database */
      require_once("config.php");

      if (isset($_REQUEST['submit'])) {
        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        /* define the query */
        $search = $_REQUEST['bookingID'];
        //want it to be ordered by client ID asc
        $query = "SELECT * FROM bookings INNER JOIN clients ON clients.clientID=bookings.clientID
                  WHERE bookings.bookingID LIKE '%$search%'";


        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query to search.");


        //took out destination/end depot in          
        echo "<table style=\" border: 1px solid black; width: 100%;\">
              <tr style = \"background-color: grey; font-weight: bold;\">
              <th> BookingID </th>
              <th> ClientID </th>
              <th> Name </th>
              <th> Email </th>
              <th> Contact Number </th>
              <th> Departure </th>
              <th> Arrival</th>
              <th> Departure Date </th>
              <th> Passengers </th>
              </tr>";

        //displaying data
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['bookingID'] . "</td>";
          echo "<td>" . $row['clientID'] . "</td>";
          echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";
          echo "<td>" . $row['emailAddress'] . "</td>";
          echo "<td>" . $row['contactNumber'] . "</td>";
          echo "<td>" . $row['initialAddress'] . ", " .  $row['initialCollectionPoint'] . "</td>";
          echo "<td>" . $row['finalAddress'] . ", " . $row['finalCollectionPoint'] . "</td>";
          echo "<td>" . $row['startDate'] . "</td>";
          echo "<td>" . $row['numberPassengers'] . "</td>";
          $numberofpassengers = $row['numberPassengers'];
          $bookingID = $row['bookingID'];
          echo "</tr>";
        }

        echo "</table>";

        /* close the connection */
        mysqli_close($conn);
      } else if (isset($_REQUEST['id']) != null) {
        /* import the config for the database */
        require_once("config.php");

        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        /* define the query */
        $query = "SELECT * FROM bookings INNER JOIN clients ON clients.clientID=bookings.clientID 
             WHERE bookings.bookingID=" . $_REQUEST['id'] . ";";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query.");

        //took out destination/end depot in          
        echo "<table style=\" border: 1px solid black; width: 100%;\">
              <tr>
              <th> BookingID </th>
              <th> ClientID </th>
              <th> Name </th>
              <th> Email </th>
              <th> Contact Number </th>
              <th> Departure</th>
              <th> Destination</th>
              <th> Departure Date </th>
              <th> Passengers </th>
              </tr>";

        //displaying data
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['bookingID'] . "</td>";
          echo "<td>" . $row['clientID'] . "</td>";
          echo "<td>" . $row['firstName'] . " " . $row['lastName'] .  "</td>";
          echo "<td>" . $row['emailAddress'] . "</td>";
          echo "<td>" . $row['contactNumber'] . "</td>";
          echo "<td>" . $row['initialAddress'] . ", " . $row['initialCollectionPoint'] . "</td>";
          echo "<td>" . $row['finalAddress'] . ", " . $row['finalCollectionPoint'] . "</td>";
          echo "<td>" . $row['startDate'] . "</td>";
          echo "<td>" . $row['numberPassengers'] . "</td>";
          $numberofpassengers = $row['numberPassengers'];
          $bookingID = $row['bookingID'];
          echo "</tr>";
        }

        echo "</table>";

        /* close the connection */
        mysqli_close($conn);
      }

      ?>
  </form>

  <table id="clientTable" style="margin: auto; width: 50%;"></table>
  <br>


  <br><br>

  <!-- retrieving vehicles from the database to create drop down -->

  <form action="reports.php?id=<?php echo $bookingID ?>" method="POST">
    <label for="vehicle">Assign Vehicle: </label>
    <select id="vehicle" name="vehicle">

      <?php

      /* import the config for the database */
      require_once("config.php");

      /* establish the connection to the database */
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("there was an error connecting to the database.");

      /* define the query */
      $query = "SELECT model,numberOfSeats,registrationNumber, licenceCode FROM vehicle ORDER BY numberOfSeats ASC";

      /* get the results of the query and put them into a variable */
      $result = mysqli_query($conn, $query)
        or die("There was an error executing the query.");

      while ($row = mysqli_fetch_array($result)) {
        if ($numberofpassengers <= $row['numberOfSeats']) {
          echo ("<option value='" .  $row['model'] . " - " .
            $row['numberOfSeats'] . " seats - " .
            $row['registrationNumber'] . "'>" .
            $row['model'] . " - " .
            $row['numberOfSeats'] . " seats - " .
            $row['registrationNumber'] . "</option>");

          $registrationNo = $row['registrationNumber'];
          $vehicleLicenseCode = $row['licenceCode'];
        }
      }

      /* close the connection */
      mysqli_close($conn);

      ?>
      <label for="vehicle"> Select </label>
    </select>

    <br><br>

    <!--  retrieving drivers from the database for drop down -->
    <label for="driver">Assign Driver: </label>
    <select id="driver" name="driver">
      <?php
      /* import the config for the database */
      require_once("config.php");

      /* establish the connection to the database */
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("there was an error connecting to the database.");

      /* define the query */
      $query = "SELECT firstName, lastName, driver.driverID, driverlicence.licenceCode 
                       FROM `driver` INNER JOIN driverlicence ON driverlicence.driverID = driver.driverID
                       ORDER BY driverID ASC;";


      /* get the results of the query and put them into a variable */
      $result = mysqli_query($conn, $query)
        or die("There was an error executing the query.");

      while ($row = mysqli_fetch_array($result)) {
        //use driverlicense table to filter which vehicles the drivers can drive according to their license codes

        if (true) {
          echo ("<option value='" . $row['driverID'] . "'>" .
            $row['driverID']
            . " " . $row['firstName'] . " " . $row['lastName'] .
            "</option>");
        }
      }

      /* close the connection */
      mysqli_close($conn);
      ?>
      <label for="driver">Select</label>
    </select>

    <br><br>

    <input type="submit" value="Create Booking">
  </form>



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