<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Reports</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

  <!-- logout button code -->
  <script>
    function logOut() {
      var retVal = confirm("Are you sure you'd like to log out?");
      if (retVal == true) {
        window.location = ("raiders.php");
        return true;
      } else {
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
        <td><a href="adminclients.php"><i class="fas fa-user"></i> Clients</a></td>
        <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
        <td><a class="active" href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
        <td>
          <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
        </td>
      </tr>
    </table>
  </div>

  <!-- creating the tab section  -->
  <div class="tab">
    <button class="tablinks" onclick="openReport(event, 'Bookings')" id="defaultOpen">Bookings</button>
    <button class="tablinks" onclick="openReport(event, 'Drivers')">Drivers</button>
    <button class="tablinks" onclick="openReport(event, 'Vehicles')">Vehicles</button>
  </div>

  <!-- bookings tab -->
  <div id="Bookings" class="tabcontent">
    <fieldset style="margin: auto; width: 100%;">

      <!-- navigation bar on the bookings tab -->
      <div class="nav">
        <table>
          <tr>
            <form action="reports.php" method="POST">
              <td><label for="orderby"> Order By: </label>
                <select id="selections" name="Select">
                  <option value="startDate">Departure Date</option>
                  <option value="endDate">Arrival Date</option>
                  <option value="initialCollectionPoint">Start City</option>
                  <option value="finalCollectionPoint">End City</option>

                </select>
              </td>
              <td>
                <input type="submit" name="go" value="Go">
              </td>
          </tr>
        </table>
      </div>

      <?php
      if (isset($_POST['go'])) {

        require_once("config.php");
        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        //echo "<h3>" . $_POST['Select'] . "</h3>";

        $query = "SELECT clients.firstName,clients.lastName,clients.clientID,clients.emailAddress,clients.contactNumber,
      bookings.bookingID, bookings.startDate,bookings.endDate,bookings.numberPassengers,bookings.initialCollectionPoint, 
      bookings.finalCollectionPoint, bookings.initialAddress, bookings.finalAddress, vehiclebooking.registrationNumber, driver.driverID 
      FROM clients 
      INNER JOIN bookings ON bookings.clientID=clients.clientID 
      INNER JOIN driver ON driver.driverID=bookings.driverID 
      INNER JOIN vehiclebooking ON vehiclebooking.bookingID=bookings.bookingID
      ORDER BY " . $_POST['Select'] .  "ASC";

        $result = mysqli_query($conn, $query)
          or  die("<strong style=\"color:red;\">There's been an error with our query!!!</strong>");

        //creating bookings table
        echo "<table style=\" border: 1px solid black;  width: 100%;\">
      <tr style = \"background-color: grey; font-weight: bold;\">
      <th> BookingID </th>
      <th> ClientID </th>
      <th> Name </th>
      <th> Email </th>
      <th> Contact Number </th>
      <th> Departure </th>
      <th> Arrival </th>
      <th> Departure Date </th>
      <th> Arrival Date </th>
      <th> Passengers </th>
      <th> DriverID </th>
      <th> Vehicle Registration No </th>
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
          echo "<td>" . $row['endDate'] . "</td>";
          echo "<td>" . $row['numberPassengers'] . "</td>";
          echo "<td>" . $row['driverID'] . "</td>";
          echo "<td>" . $row['registrationNumber'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";

        //close the connection
        mysqli_close($conn);
      }

      ?>

      <?php
      if (isset($_REQUEST['id']) != null) {


        require_once("config.php");
        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        $bookingID = $_REQUEST['id'];
        $length = strlen($_POST['vehicle']);
        $registrationNo = substr($_POST['vehicle'], ($length - 10));

        $vehicleBookingID = $bookingID . $registrationNo;


        /* define the query */
        $query = "INSERT INTO vehiclebooking (`vehicleBookingID`, `bookingID`, `registrationNumber`)
                VALUES ('$vehicleBookingID', '$bookingID', '$registrationNo')";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query to assign the vehicle.");

        /* close the connection */
        mysqli_close($conn);

        require_once("config.php");
        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        $driverID = $_POST['driver'];


        $query = "UPDATE `bookings` SET `driverID`= '$driverID' WHERE `bookingID` = '$bookingID'";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query to assign the driver.");

        /* close the connection */
        mysqli_close($conn);
      }
      ?>


      <!-- populating the bookings table with php -->
      <form action="reports.php" method="POST">
        <?php
        if (!(isset($_POST['go']))) {

          require_once("config.php");

          $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
            or die("<strong style=\"color:red;\">There's been a glitch while trying to connect to our database!</strong>");


          //query instructions
          $query = "SELECT clients.firstName,clients.lastName,clients.clientID,clients.emailAddress,clients.contactNumber,
  bookings.bookingID, bookings.startDate,bookings.endDate,bookings.numberPassengers,bookings.initialCollectionPoint, 
  bookings.finalCollectionPoint,bookings.initialAddress, bookings.finalAddress,vehiclebooking.registrationNumber, driver.driverID 
  FROM clients 
  INNER JOIN bookings ON bookings.clientID=clients.clientID 
  INNER JOIN driver ON driver.driverID=bookings.driverID 
  INNER JOIN vehiclebooking ON vehiclebooking.bookingID=bookings.bookingID
  ORDER BY bookings.bookingID DESC";

          $result = mysqli_query($conn, $query)
            or  die("<strong style=\"color:red;\">There's been an error with our query!</strong>");

          //creating bookings table
          echo "<table style=\" border: 1px solid black;  width: 100%;\">
  <tr style = \"background-color: grey; font-weight: bold;\">
  <th> BookingID </th>
  <th> ClientID </th>
  <th> Name </th>
  <th> Email </th>
  <th> Contact Number </th>
  <th> Departure </th>
  <th> Arrival </th>
  <th> Departure Date </th>
  <th> Arrival Date </th>
  <th> Passengers </th>
  <th> DriverID </th>
  <th> Vehicle Registration No </th>
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
            echo "<td>" . $row['endDate'] . "</td>";
            echo "<td>" . $row['numberPassengers'] . "</td>";
            echo "<td>" . $row['driverID'] . "</td>";
            echo "<td>" . $row['registrationNumber'] . "</td>";
            echo "</tr>";
          }
          echo "</table>";

          //close the connection
          mysqli_close($conn);
        }
        ?>

    </fieldset>
  </div> <!-- end of booking tabs code -->

  <!-- drivers tab -->
  <div id="Drivers" class="tabcontent">
    <fieldset style="margin: auto; width: 100%;">

      <!-- navigation bar on drivers tab -->

      <!-- populating the drivers table with php -->
      <form action="reports.php" method="POST">
        <?php

        /* import the config for the database */
        require_once("config.php");

        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        /* define the query */
        $query = "SELECT driver.driverID,driver.firstName,driver.lastName,driver.contactNumber,bookings.bookingID
  FROM driver 
  INNER JOIN bookings ON bookings.driverID=driver.driverID";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query.");



        //creating bookings table
        echo "<table style=\" border: 1px solid black; width: 100%;\">
  <tr style = \"background-color: grey; font-weight: bold;\">
  <th> DriverID </th>
  <th> First Name </th>
  <th> Last Name </th>
  <th> Contact Number </th>
  <th> Booking ID </th>
  </tr>";

        //displaying data
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['driverID'] . "</td>";
          echo "<td>" . $row['firstName'] . "</td>";
          echo "<td>" . $row['lastName'] .  "</td>";
          echo "<td>" . $row['contactNumber'] . "</td>";
          echo "<td>" . $row['bookingID'] .  "</td>";
          echo "</tr>";
        }

        echo "</table>";

        //close the connection
        mysqli_close($conn);

        ?>

    </fieldset>
  </div>
  <!--end of drivers tab code -->

  <!-- drivers tab -->
  <div id="Vehicles" class="tabcontent">
    <fieldset style="margin: auto; width: 100%;">


      <!-- populating the vehicles table with php -->
      <form action="reports.php" method="POST">
        <?php

        /* import the config for the database */
        require_once("config.php");

        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        /* define the query */
        $query = "SELECT vehicle.registrationNumber,vehicle.model,vehicle.make,vehicle.numberOfSeats,
 vehiclebooking.bookingID,bookings.bookingID,driver.driverID 
 FROM vehicle 
 INNER JOIN vehiclebooking ON vehiclebooking.registrationNumber=vehicle.registrationNumber 
 INNER JOIN bookings ON bookings.bookingID=vehiclebooking.bookingID 
 INNER JOIN driver ON driver.driverID=bookings.driverID";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query.");

        //creating vehicles table
        echo "<table style=\" border: 1px solid black; width: 100%;\">
  <tr style = \"background-color: grey; font-weight: bold;\">
  <th> Vehicle Registration No </th>
  <th> Model </th>
  <th> Make </th>
  <th> Seats </th>
  <th> Booking ID </th>
  <th> Driver ID </th>
  </tr>";

        //displaying data
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['registrationNumber'] . "</td>";
          echo "<td>" . $row['model'] . "</td>";
          echo "<td>" . $row['make'] .  "</td>";
          echo "<td>" . $row['numberOfSeats'] . "</td>";
          echo "<td>" . $row['bookingID'] .  "</td>";
          echo "<td>" . $row['driverID'] .  "</td>";
          echo "</tr>";
        }

        echo "</table>";

        //close the connection
        mysqli_close($conn);

        ?>

    </fieldset>
  </div>
  <!--end of drivers tab code -->


  <!-- javascript code to control the tabs  -->
  <script>
    function openReport(evt, report) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(report).style.display = "block";
      evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>



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