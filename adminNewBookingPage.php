<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

  <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("raiders.php"); 
           return true;
        } 
        else {
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
                    <td><a href="adminclients.php"><i class="fas fa-user"></i> Clients</a></td>
                    <td><a class="active" href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                    <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
                    <td>
                        <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                    </td>
                </tr>
            </table>
</div>


<h2 id="bookingHeader">Booking ID:
<input type="text" name="bookingID" id="bookingID">
<input type="submit" name="submit" value="Search"></h2>
 
<fieldset style="margin: auto; width: 70%;">
<legend>Booking ID: <?php echo $_REQUEST['id']; ?></legend>

<form action="adminNewBookingPage.php" method="POST">
 <?php 
  /* import the config for the database */
    require_once("config.php");

    /* establish the connection to the database */
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("there was an error connecting to the database.");

    /* define the query */
    $query ="SELECT * FROM bookings INNER JOIN client ON client.clientID=bookings.clientID 
             WHERE bookings.bookingID=" . $_REQUEST['id'] . ";";
 
    /* get the results of the query and put them into a variable */
    $result = mysqli_query($conn, $query)
            or die("There was an error executing the query.");
   
   //took out destination/end depot in          
   echo "<table style=\" border: 1px solid black; width: 100%;\">
   <tr>
   <th> ClientID </th>
   <th> First Name </th>
   <th> Last Name </th>
   <th> Email </th>
   <th> Contact Number </th>
   <th> Start Depot </th>
   <th> Start Date </th>
   <th> Number of Passengers </th>
   </tr>";
  
   //displaying data
   while($row=mysqli_fetch_array($result))
   {
     echo "<tr>";
      echo "<td>" . $row['clientID'] . "</td>";
     echo "<td>" . $row['firstname'] . "</td>";
      echo "<td>" . $row['lastName'] .  "</td>";
     echo "<td>" . $row['emailAddress'] . "</td>";
      echo "<td>" . $row['contactNumber'] . "</td>";
     echo "<td>" . $row['initialCollectionPoint'] . "</td>";
      echo "<td>" . $row['startDate'] . "</td>";
     echo "<td>" . $row['numberPassengers'] . "</td>";
    echo "</tr>";
    }

   echo "</table>";

      /* close the connection */
      mysqli_close($conn); 

?>

<table id="clientTable" style="margin: auto; width: 50%;">

  </table>    
        <br>

        <div class="inputLabel">
          <!-- when querying the database, add a WHERE clause to filter on seat number -->
            <!-- put this in php and echo an option for each vehicle from the database -->
        <label for="driver">Assign Vehicle: </label>
            <select id="vehicle" name="vehicle">
                <option value="Vehicle 1 From DB">Vehicle 1 From DB</option>
                <option value="Vehicle 2">Vehicle 2</option>
                <option value="vehicle 3">Vehicle 3</option>
                <option value="Etc.">Etc.</option>
        </select>
        </div>

        <br><br>

<!-- retrieving drivers from the database to create drop down -->
        <div class="inputLabel">
            <label for="driver">Assign Driver: </label>
            <select id="driver" name="driver"> 
                    <?php
                    /* import the config for the database */
                      require_once("config.php");

                      /* establish the connection to the database */
                      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                          or die("there was an error connecting to the database.");

                      /* define the query */
                      $query ="SELECT driverID,firstName,lastName FROM `driver`";

                      /* get the results of the query and put them into a variable */
                      $result = mysqli_query($conn, $query)
                              or die("There was an error executing the query.");

                      while($row = mysqli_fetch_array($result)) {
                        echo("<option value='".$row['id']."'>" . 
                        $row['driverID'] . " " . $row['firstName'] . " " . $row['lastName'] .
                        "</option>");
                      }

                      /* close the connection */
                      mysqli_close($conn);
                      ?> 
              <label for="driver">Select</label>
                </select>
        </div>
         
        <br><br>

        <input type="submit" value="Create Booking">
      
    </form>
    <br>
  
    
</fieldset>

 <!-- general footer code  -->
 <div class="footer"> 
  <nav>
    <table>
          <tr>
            <td><a href="aboutus.php">About Us</a> | </td>
            <td><a href="help.php">Help</a> | </td>
            <td><a href="faq.php">FAQs</a> | </td>
            <td><a href="legal.php">Legal</a> | </td>
            <td>&copy; Copyright 2020 Raiders</td>
          </tr>
      </table>
    </nav>
  </div>    

</body>
</html>