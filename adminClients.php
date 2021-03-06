<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Clients</title>
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
        <td><a class="active" href="adminClients.php"><i class="fas fa-user"></i> Clients</a></td>
        <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
        <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
        <td>
                    <div style = "position:relative; left:1250px; top:2px;">
                        <form action="raiders.php" class="Logout">
                        <input type="button" name="submit" value="Logout" onclick="logOut();">
                        </form>
                    </div>
                </td>
      </tr>
    </table>
  </div>



  <!-- search the client databases using clientID -->
  <div style = "position:relative; left:35px; top:100px;">
  <fieldset style="margin: auto; width: 50%;">

    <!-- populating the client fields -->
    <?php

    

      require_once("config.php");
    //CODE THAT SHOWS DETAILS FROM CLICKING ON THE INCOMING BOOKING REQUESTS ON ADMINHOMEPAGE 

    
      /* establish the connection to the database */
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("there was an error connecting to the database.");

      /* define the query */
      $query = "SELECT * FROM bookings INNER JOIN clients ON clients.clientID=bookings.clientID 
              WHERE bookings.bookingID=" . $_REQUEST['id'] . ";";

      /* get the results of the query and put them into a variable */
      $result = mysqli_query($conn, $query)
        or die("There was an error executing the query.");

      while ($row = mysqli_fetch_array($result)) {
        $bookingID = $row['bookingID'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['emailAddress'];
        $contactNumber = $row['contactNumber'];
        $startAddress = $row['initialAddress'];
        $startDepot = $row['initialCollectionPoint'];
        $finalAddress = $row['finalAddress'];
        $endDepot = $row['finalCollectionPoint'];
        $numberPassengers = $row['numberPassengers'];
        $startDate = $row['startDate'];
        $endDate = $row['endDate'];
      }

      /* close the connection */
      mysqli_close($conn);
    
    ?>

    <!-- creating the area client data will populate into -->
    <legend>Booking ID: <?php echo $bookingID; ?></legend>
    <form action="adminNewBookingPage.php" method="POST">
      <table id="clientTable" style="margin: auto; width: 50%;">
        <tr>
          <td><label for="firstName">First Name:</label></td>
          <td><input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="lastName">Last Name:</label></td>
          <td><input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="email">Email:</label></td>
          <td><input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="contactNumber">Contact Number:</label></td>
          <td><input type="text" id="contactNumber" name="contactNumber" value="<?php echo $contactNumber; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="startDepot">Departure:</label></td>
          <td><input type="text" id="startDepot" name="startDepot" value="<?php echo $startAddress . ", " . $startDepot; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="destinationDepot">Arrival:</label></td>
          <td><input type="text" id="destinationDepot" name="destinationDepot" value="<?php echo $finalAddress . ", " . $endDepot; ?>" read only></td>
        </tr>
        <tr>
          <td><label for="numberPassengers">Passengers:</label></td>
          <td><input type="text" id="numberPassengers" name="numberPassengers" value="<?php echo $numberPassengers; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="date">Departure Date:</label></td>
          <td><input type="text" id="date" name="date" value="<?php echo $startDate; ?>" readonly></td>
        </tr>
        <tr>
          <td><label for="date">Arrival Date:</label></td>
          <td><input type="text" id="date" name="date" value="<?php echo $endDate; ?>" readonly></td>
        </tr>
      </table>

      <a href="adminNewBookingPage.php?id=<?php echo $_REQUEST['id']; ?>"><input type="button" name="confirm" value="Confirm"></a>
      <p></p>
      <form action="" method="POST">

        <!-- Sends a message to the client informing them the details they have entered are incorrect. -->
        <a href="rejectdetails.php?id=<?php echo $bookingID; ?>&email=<?php echo $email; ?>"><input type="button" name="confirm" value="Reject"></a>

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