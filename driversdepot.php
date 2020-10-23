<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driver Depots</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">

  <!-- logout button code -->
  <script>
    function logOut() {
      var retVal = confirm("Are you sure you'd like to log out?");
      if (retVal == true) {
        window.location = ("driverlogin.php");
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
        <td><a href="drivershomepage.php?id=<?php echo $_REQUEST['id']; ?>"><i class="fas fa-home"></i>Home</a></td>
        <td><a class="active" href="driversdepot.php?id=<?php echo $_REQUEST['id']; ?>"><i class="fas fa-bed"></i> Depot</a></td>
        <td><a href="driverNotifications.php?id=<?php echo $_REQUEST['id']; ?>"><i class="fas fa-bell"></i> Notifications</a></td>
        <td>
                    <div style = "position:relative; left:1300px; top:2px;">
                        <form action="driverlogin.php" class="Logout">
                        <input type="button" name="submit" value="Logout" onclick="logOut();">
                        </form>
                    </div>
        </td>
      </tr>
    </table>
  </div>
  <div style = "position:relative; left:35px; top:100px;">
  <?php
  /* import the config for the database */
  require_once("config.php");

  $driverID = $_REQUEST['id'];

  /* establish the connection to the database */
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("there was an error connecting to the database.");

  /* define the query */
  $query = "SELECT * FROM bookings INNER JOIN driver ON driver.driverID=bookings.driverID WHERE driver.driverID='$driverID'";

  /* get the results of the query and put them into a variable */
  $result = mysqli_query($conn, $query)
    or die("There was an error executing the query.");


  while ($row = mysqli_fetch_array($result)) {
    $driverID = $row['driverID'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $contactNumber = $row['contactNumber'];
    $bookingID = $row['bookingID'];
    $startDate = $row['startDate'];
    $startLocation = $row['initialCollectionPoint']; //start city
    $endLocation = $row['finalCollectionPoint']; //end city
  }

  /* close the connection */
  mysqli_close($conn);


  ?>



  <fieldset style="margin: auto; width: 50%;">
    <legend>Driver ID: <?php echo $driverID; ?></legend>
    <form method="POST">
      <table id="driverTable" style="margin: auto; width: 50%;">
        <tr>
          <td><label for="firstName">First Name:</label></td>
          <td><input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="lastName">Last Name:</label></td>
          <td><input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="contactNumber">Contact Number:</label></td>
          <td><input type="text" id="contactNumber" name="contactNumber" value="<?php echo $contactNumber; ?>" readonly></td>
        </tr>
        <td><label for="startDate">Start Date:</label></td>
        <td><input type="text" id="startDate" name="startDate" value="<?php echo $startDate; ?>" readonly></td>
        </tr>
        <td><label for="firstName">End City:</label></td>
        <td><input type="text" id="endLocation" name="endLocation" value="<?php echo $endLocation; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="depot">Book Room at depot:</label></td>
          <td><select id="depotRoom" name="depotRoom">
              <?php
              /* import the config for the database */
              require_once("config.php");

              /* establish the connection to the database */
              $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                or die("there was an error connecting to the database.");

              /* define the query */
              $query = "SELECT depotID,depotName FROM `depot`";

              /* get the results of the query and put them into a variable */
              $result = mysqli_query($conn, $query)
                or die("There was an error executing the query.");

              while ($row = mysqli_fetch_array($result)) {
                echo ("<option value='" . $row['depotID'] . "'>" .
                  $row['depotID'] . ": " . $row['depotName'] .
                  "</option>");
              }

              /* close the connection */
              mysqli_close($conn);
              ?>
              <label for="depotRoom">Select</label>
            </select>
      </table>

<br>
      <input type="submit" name="checkAvailability" value="Check Room Availiability">
      <?php
      /* import the config for the database */
      require_once("config.php");

      if (isset($_REQUEST['checkAvailability'])) {
        /* establish the connection to the database */

        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        $bedRequest = TRUE;

        /* define the query */
        $query = "INSERT INTO `daytrip`(`date`, `bedRequest`, `bookingID`) VALUES ('$startDate','$bedRequest','$bookingID')";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query to insert.");




        /* close the connection */
        mysqli_close($conn);

        require_once("config.php");

        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        $bedRequest = TRUE;


        /* define the query */
        $query = "UPDATE `driver` SET `requestStatus`= 'Pending' WHERE driverID = '$driverID'";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query to set the status");



        echo "<br><br>" . "<strong style= \"color:black\"><h2>Room Request sent</h2></strong>";


        /* close the connection */
        mysqli_close($conn);


        /* import the config for the database */
        require_once("config.php");

        /* establish the connection to the database */

        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        /* define the query */
        $query = "SELECT daytrip.tripNumber FROM daytrip WHERE daytrip.bookingID='$bookingID'";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query.");

        $row = mysqli_fetch_array($result);
        $tripNumber = $row['tripNumber'];


        /* close the connection */
        mysqli_close($conn);

        /* import the config for the database */
        require_once("config.php");

        /* establish the connection to the database */

        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

        $endDepotID = $_POST['depotRoom'];
        $tripDepotID = $tripNumber . $endDepotID;

        $startDepotID = "depot7";

        /* define the query */
        $query = "INSERT INTO `daytripdepot`(`tripDepotID`, `tripNumber`, `endDepotID`) 
    VALUES ('$tripDepotID','$tripNumber','$endDepotID')";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
          or die("There was an error executing the query!!!!!!!!.");

        /* close the connection */
        mysqli_close($conn);
      }


      ?>

    </form>
  </fieldset>
    </div>


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