<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <title>Depot Admin Reports</title>
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">

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
        <td><a href="depotadminhome.php"><i class="fas fa-home"></i>Home</a></td>
        <td><a href="bedrequests.php"><i class="fas fa-bed"></i>Room Request</a></td>
        <td><a class="active" href="depotadminreports.php"><i class="fas fa-list"></i> Reports</a></td>
        <td>
          <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
        </td>
      </tr>
    </table>
  </div>



  <!-- populating and creating the depot reports table that shows which beds are occuppied -->

  <fieldset style="margin: auto; width: 70%;">
    <form action="depotadminreports.php" method="POST">
      <?php
      if (isset($_REQUEST['id']) != null) {
        //database credentials
        require_once("config.php");

        $depotID = $_REQUEST['id'];

        // making connection
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
          or die("<strong style=\"color:red;\">There's been a glitch while trying to connect to our database!</strong>");

        //query instructions
        $query = "UPDATE `depot` SET `numberBedsAvailable`=`numberBedsAvailable`-1 
        WHERE depot.depotID='$depotID'";

        $result = mysqli_query($conn, $query)
          or  die("<strong style=\"color:red;\">There's been an error with our query!!!!</strong>");

        //close the connection
        mysqli_close($conn);
      }

      //database credentials
      require_once("config.php");

      // making connection
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("<strong style=\"color:red;\">There's been a glitch while trying to connect to our database!</strong>");


      //query instructions
      $query = "SELECT * FROM daytrip 
         INNER JOIN daytripdepot ON daytripdepot.tripNumber=daytrip.tripNumber 
         INNER JOIN depot ON depot.depotID=daytripdepot.endDepotID
         ORDER BY date ASC";

      $result = mysqli_query($conn, $query)
        or  die("<strong style=\"color:red;\">There's been an error with our query!</strong>");

      //creating bookings table
      echo "<table style=\" border: 1px solid black;  width: 100%;\">
         <tr style = \"background-color: grey; font-weight: bold;\">
         <th> Depot ID </th>
         <th> Trip Number </th>
         <th> Depot Name </th>
         <th> Date </th>
         <th> Number of Rooms Available </th>
         </tr>";

      //displaying data
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['depotID'] . "</td>";
        echo "<td>" . $row['tripNumber'] . "</td>";
        echo "<td>" . $row['depotName'] . "</td>";
        echo "<td>" . $row['date'] .  "</td>";
        echo "<td>" . $row['numberBedsAvailable'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";

      //close the connection
      mysqli_close($conn);

      ?>
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