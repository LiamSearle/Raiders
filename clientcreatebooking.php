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
  <title>Create Booking</title>
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

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
        <td><a class="active" href="clientcreatebooking.php"><i class="fas fa-home"></i> Home</a></td>
        <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
        <td><a href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
        <td>
          <div style = "position:relative; left:1350px; top:2px;" >
            <form action="clientlogin.php" class="Logout">
              <input type="button" name="submit" value="Logout" onclick="logOut();">
            </form>
          </div>
        </td>
      </tr>
    </table>
  </div>

<div style = "position:relative; left:35px; top:150px;">
  <fieldset style="margin: auto; width: 30%;">
    <h2>Enter booking details</h2>
    <form action="clientcreatebooking.php" method="POST">

      <table>
        <tr>
          <td><label for="startdate"> Departure Date:</label></td>
          <td><input type="date" id="startdate" name="startdate" placeholder="Start Date" size="16"></td>
        </tr>
        <tr>
          <td><label for="enddate">Arrival Date:</label></td>
          <td><input type="date" id="enddate" name="enddate" placeholder="End Date" size="16"></td>
        </tr>
        <tr>
          <td><label for="numberPassengers">Passengers:</label></td>
          <td><input type="text" id="numberPassengers" name="numberPassengers" placeholder="Number of Passengers" size="16"></td>
        </tr>
        <tr>
          <td><label for="collection">Departing From:</label></td>
          <td><input type="text" id="startcollection" name="startcollection" placeholder="Street name" size="16"></td>
          <td><select id="startCity" name="startCity">
              <option value="">--- Select City ---</option>
              <?php

              /* import the config for the database */
              require_once("config.php");

              /* establish the connection to the database */
              $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                or die("there was an error connecting to the database.");

              /* define the query */
              $query = "SELECT town FROM `depot` ORDER BY town ASC";

              /* get the results of the query and put them into a variable */
              $result = mysqli_query($conn, $query)
                or die("There was an error executing the query.");

              while ($row = mysqli_fetch_array($result)) {
                echo ("<option value='" . $row['town']  . "'>" . $row['town'] .  "</option>");
              }

              /* close the connection */
              mysqli_close($conn);

              ?>

              <label for="startCity">Select</label>
            </select></td>
        </tr>
        <tr>
          <td><label for="collection">Destination:</label></td>
          <td><input type="text" id="endcollection" name="endcollection" placeholder="Street Name" size="16"></td>

          <!--populating the end city drop down menu -->

          <td><select id="endCity" name="endCity">
              <option value="">--- Select City ---</option>
              <?php

              /* import the config for the database */
              require_once("config.php");

              /* establish the connection to the database */
              $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                or die("there was an error connecting to the database.");

              /* define the query */
              $query = "SELECT town FROM `depot` ORDER BY town ASC";

              /* get the results of the query and put them into a variable */
              $result = mysqli_query($conn, $query)
                or die("There was an error executing the query.");

              while ($row = mysqli_fetch_array($result)) {
                echo ("<option value='" . $row['town']  . "'>" . $row['town'] .  "</option>");
              }

              /* close the connection */
              mysqli_close($conn);

              ?>

              <label for="endCity">Select</label>
            </select></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="submit" value="Add"></td>
        </tr>
        <td><a href="http://"></a></td>
      </table>
    </form>


    <?php


    //checking if the searching form has been submitted 
    if (isset($_REQUEST['submit'])) {
      //get the value from the form
      require_once("config.php");
      $id = $_SESSION['clientID'];
      $startdate = $_REQUEST['startdate'];
      $enddate = $_REQUEST['enddate'];
      $passengers = $_REQUEST['numberPassengers'];
      $initialCity = $_REQUEST['startCity'];
      $initialcollectionpoint = $_REQUEST['startcollection']; //start address
      $finalCity = $_REQUEST['endCity'];
      $finalcollectionpoint = $_REQUEST['endcollection']; //end address


      if ((int) $passengers > 50) {
        echo "<script> alert(\"You have entered too many passengers\"); </script>";
      } else {


        // Create connection
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("Error connecting to the database");

        //issue the query to insert details to the database
        $query = "INSERT INTO bookings (startDate, endDate, numberPassengers, initialCollectionPoint, initialAddress, finalCollectionPoint, finalAddress, clientID) 
              VALUES ('$startdate', '$enddate', '$passengers', '$initialCity', '$initialcollectionpoint', '$finalCity', '$finalcollectionpoint', '$id')";

        //execute the query 
        $result = mysqli_query($conn, $query)
          or die("Error adding booking details");

        echo "<strong style= \"color:black\"><h2>Booking created sucessfully!</h2></strong>";
        //close the database
        mysqli_close($conn);
        // header("Location:bookingmessage.php");
      }
    }
    ?>
  </fieldset>
</div>

  <!-- general footer code  -->
  <div class="footer">
    <nav>
      <table>
        <tr>
          <td><a href="clientaboutus.php">About Us</a> | </td>
          <td><a href="clientfaq.php">FAQs</a> | </td>
          <td><a href="clientlegal.php">Legal</a> | </td>
          <td><a href="clientterms.php">Terms & Conditions</a> | </td>
          <td><a href="clientcontactus.php">Contact Us</a></td>
          <td>&copy; Copyright 2020 Raiders</td>
        </tr>
      </table>
    </nav>
  </div>

</body>

</html>