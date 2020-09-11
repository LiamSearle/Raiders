<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav>
       <table>
            <tr>
                <td><img src="images/logoo.png" height="40px"></td>
                <td><a href="bookingreq.php">Home</a></td>
                <td><a href="clients.php">Clients</a></td>
                <td><a href="booking.php">Bookings</a></td>
                <td><form action="search.php" method="post">
                <i class="fas fa-search"></i>
                <input type="search" name="txtSearch">
                <input type="submit" name="submit" value="Go">
                </form></td>
            </tr>
        </table>
    </nav>
    <br>
    <fieldset>
   <table>
       <tr>
           <td>Client ID</td>
           <td><input type="text" name="client_fname"></td>
       </tr>
       <tr>
           <td>Driver</td>
           <td><select name="driver" id="driver" style="width:173px;">
               <option> A</option>
               <option> B</option>
               <option> C</option>
               <option> D</option>
           </select></td>
       </tr>
       <tr>
           <td>Vehicles</td>
           <td><select name="vehicles" id="vehicles" style="width:173px;">
               <option> A</option>
               <option> B</option>
               <option> C</option>
               <option> D</option>
           </select></td>
       </tr>
   </table>
</fieldset>
<?php
    //add database credentials 
    require_once("config.php");
    //checking if the searching form has been submitted 
    if (isset($_REQUEST['submit'])) {
        //get the value from the form
        $search = $_REQUEST['txtSearch'];
        //make the connection to database
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("Could not connect to the database!");
        //issue out the query instructions
        $query = "SELECT * FROM bookings WHERE bookingID LIKE '%$search%'
        ORDER BY bookingID ASC";
        $results = mysqli_query($conn, $query)
        or die("Could not retrieve the data!");
        //extract the data 
        echo "<ol>";
        while ($row = mysqli_fetch_array($results)){
            echo "<li>";
            echo $row['bookingID'];
            echo "</li>";
        }
        echo "</ol>";
        //close the connection to the database
        mysqli_close($conn);
    }
    ?>
      <!creating footer with links to different pages>
    <div>
    <footer id="footer"> <nav>
       <table>
            <tr>
                <td><img src="images/logoo.png" height="40px"></td>
                <td><a href="aboutus.php">About Us</a></td>
                <td><a href="#######">FAQs</a></td>
                <td><a href="#######">Legal</a></td>
                <td><a href="#######">Terms & Conditions</a></td>
            </tr>
        </table>
    </nav>
</footer>
    </div>
</body>
</html>