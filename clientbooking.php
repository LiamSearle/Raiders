<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Booking-should delete</title>

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
                <td><a href="clienthome.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
                <td><a class="active" href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                </form>
                <td><div>                 
                <form action = "clientlogin.php" class = "Logout">
                <input type="submit" name="submit" value="Logout" onclick="logOut();">
                 </form>
                </div></td>
            </tr>
        </table>
</div>


    <br>
    <fieldset>
    <?php
    $id= $_REQUEST['id'];
    //add database credentials
    require_once("config.php");
    //connection to the database
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("Could not connect to the database");
    //issue instructions to query 
    $query = "SELECT * FROM bookings where bookingID= '$id'";
    $result = mysqli_query($conn, $query)
     or die ("Could not retrieve data!");
     //create table 
     echo "<table style = \"width:80%;\">
     <tr style = \"background-color: orange; font-weight: bold;\">
     <td>Start Date</td>
     <td>End Date</td>
     <td>Number of Passengers</td>
     <td>Initial Collection Point</td>
     </tr>";
     //execute table rows with the data from the database
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['startDate']."</td>";
        echo "<td>".$row['endDate']."</td>";
        echo "<td>".$row['numberPassengers']."</td>";
        echo "<td>".$row['intialCollectionPoint']."</td>";
        echo"</tr>";
    }
?>
</fieldset>

     
 <!-- general footer code  -->
 <div class="footer"> 
  <nav>
    <table>
        <tr>
            <td><a href="clientaboutus.php">About Us</a></td>
            <td><a href="clienthelp.php">Help</a> | </td>
            <td><a href="clientfaq.php">FAQs</a></td>
            <td><a href="clientlegal">Legal</a></td>
            <td><a href="clientterms.php">Terms & Conditions</a></td>
            <td>&copy; Copyright 2020 Raiders</td>
        </tr>
    </table>
  </nav>
</div>     

</body>
</html>