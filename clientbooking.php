<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="images/small_logo.png" type="image/gif" sizes="100x100">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <title>Booking</title>

  <!-- logout button code -->
  <script>
    function logOut() {
      var retVal = confirm("Are you sure you'd like to log out?");
      if (retVal == true) {
        window.location = ("clientlogin.php");
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
        <td><a href="clientcreatebooking.php"><i class="fas fa-home"></i>Home</a></td>
        <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
        <td><a class="active" href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
        </form>
        <td>
          <div>
            <form action="clientlogin.php" class="Logout">
              <input type="button" name="submit" value="Logout" onclick="logOut();">
            </form>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <h2>Booking details</h2>

  <br>
  <fieldset>
    <?php
    $id = $_SESSION['clientID'];
    //add database credentials
    require_once("config.php");
    //connection to the database
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
      or die("Could not connect to the database");
    //issue instructions to query 
    $query = "SELECT * FROM bookings where clientID= '$id'";
    $result = mysqli_query($conn, $query)
      or die("Could not retrieve data!");
    //create table 
    echo "<table style=\" border: 1px solid black; width: 100%;\">
     <tr style = \"background-color: grey; font-weight: bold;\">
     <td>Start Date</td>
     <td>End Date</td>
     <td>Passengers</td>
     <td>Departure</td>
     <td>Destination</td>
     <td>Status</td>
     </tr>";
    //execute table rows with the data from the database
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['startDate'] . "</td>";
      echo "<td>" . $row['endDate'] . "</td>";
      echo "<td>" . $row['numberPassengers'] . "</td>";
      echo "<td>" . $row['initialAddress'] . ", " . $row['initialCollectionPoint'] . "</td>";
      echo "<td>" . $row['finalAddress'] . ", " .  $row['finalCollectionPoint'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "</tr>";
    }
    echo "</table>"
    ?>
  </fieldset>


  <!-- general footer code  -->
  <div class="footer">
    <nav>
      <table>
        <tr>
          <td><a href="clientaboutus.php">About Us</a> | </td>
          <td><a href="clienthelp.php">Help</a> | </td>
          <td><a href="clientfaq.php">FAQs</a> | </td>
          <td><a href="clientlegal.php">Legal</a> | </td>
          <td><a href="clientterms.php">Terms & Conditions</a></td>
          <td>&copy; Copyright 2020 Raiders</td>
        </tr>
      </table>
    </nav>
  </div>

</body>

</html>