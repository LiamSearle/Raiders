<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driver Depots</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

  <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("driverlogin.php"); 
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
                    <td><a  href="drivershomepage.php"><i class="fas fa-home"></i>Home</a></td>
                    <td><a class="active" href="driversdepot.php"><i class="fas fa-bed"></i> Depot</a></td>
                    <td>
                        <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                    </td>
                </tr>
            </table>
</div>

<?php
        /* import the config for the database */
      require_once("config.php");

      $driverID=$_REQUEST['id'];
      
      /* establish the connection to the database */
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("there was an error connecting to the database.");

      /* define the query */
      $query ="SELECT * FROM bookings INNER JOIN driver ON driver.driverID=bookings.driverID WHERE driver.driverID='$driverID'";

      /* get the results of the query and put them into a variable */
      $result = mysqli_query($conn, $query)
              or die("There was an error executing the query.");

    
      while($row = mysqli_fetch_array($result)) {
        $driverID=$row['driverID'];
        $firstName=$row['firstName'];
        $lastName=$row['lastName'];
        $contactNumber=$row['contactNumber'];

      }

      /* close the connection */
      mysqli_close($conn);

    
     ?>



<fieldset>
<legend>Driver ID: <?php echo $driverID; ?></legend>
<table id="driverTable" style="margin: auto; width: 50%;">
      <tr><td><label for="firstName">First Name:</label></td>
      <td><input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" readonly></td></tr>
        <tr><td><label for="lastName">Last Name:</label></td>
        <td><input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" readonly></td></tr>
        <tr><td><label for="contactNumber">Contact Number:</label></td>
        <td><input type="text" id="contactNumber" name="contactNumber" value="<?php echo $contactNumber; ?>" readonly></td></tr>
        <tr><td><label for="depotRoom">Book Room at depot:</label></td>
        <td><select id="depotRoom" name="depotRoom"> 
                  <?php
                  /* import the config for the database */
                    require_once("config.php");

                    /* establish the connection to the database */
                    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                        or die("there was an error connecting to the database.");

                    /* define the query */
                    $query ="SELECT depotID,depotName FROM `depot`";

                    /* get the results of the query and put them into a variable */
                    $result = mysqli_query($conn, $query)
                            or die("There was an error executing the query.");

                    while($row = mysqli_fetch_array($result)) {
                      echo("<option value='".$row['id']."'>" . 
                      $row['depotID'] . ": " . $row['depotName'] . 
                      "</option>");
                    }

                    /* close the connection */
                    mysqli_close($conn);
                    ?> 
            <label for="depotRoom">Select</label>
              </select>

        <tr><td><input style="margin-left: 50%" type="submit" name="checkAvailability" value="Check Room Availiability"></td></tr>

      </table>
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