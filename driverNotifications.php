<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driver Notifications</title>
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
        <td><a href="driversdepot.php?id=<?php echo $_REQUEST['id']; ?>"><i class="fas fa-bed"></i> Depot</a></td>
        <td><a class="active" href="driverNotifications.php?id=<?php echo $_REQUEST['id']; ?>"><i class="fas fa-bell"></i> Notifications</a></td>
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




  <br></br>
  <div style = "position:relative; left:35px; top:100px;">
  <fieldset style="margin: auto; width: 50%;">

    <?php
    /* import the config for the database */
    require_once("config.php");

    $driverID = $_REQUEST['id'];

    /* establish the connection to the database */
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
      or die("there was an error connecting to the database.");

    /* define the query */
    $query = "SELECT driver.driverID,driver.firstName,driver.lastName,driver.requestStatus,bookings.bookingID
     FROM driver INNER JOIN bookings ON bookings.driverID=driver.driverID
    WHERE driver.driverID='$driverID'";

    /* get the results of the query and put them into a variable */
    $result = mysqli_query($conn, $query)
      or die("There was an error executing the query.");
    echo "<table style=\" border: 1px solid black; width: 100%;\">
              <tr style = \"background-color: grey; font-weight: bold;\">
              <td>Driver ID</td>
              <td>Booking ID</td>
              <td>First Name</td>
              <td>Last Name</td>
              <td>Status</td>
              </tr>";

    //execute table rows with the data from the database
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['driverID'] . "</td>";
      echo "<td>" . $row['bookingID'] . "</td>";
      echo "<td>" . $row['firstName'] . "</td>";
      echo "<td>" . $row['lastName'] . "</td>";
      echo "<td>" . $row['requestStatus'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";



    /* close the connection */
    mysqli_close($conn);


    ?>
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