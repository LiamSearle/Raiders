<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Clients-should delete</title>
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
                <td><a href="homepage.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a class="active" href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
                <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
                <td>
                    <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
               </td>
            </tr>
        </table>
</div>
    <br>
    <form action="client.php" method="post"> <fieldset>
    <label for="clientid">Client ID</label>
    <input type="text" placeholder="Client ID"></fieldset>
    
       
    <fieldset><p>Client Information
   <table>
       <tr>
           <td>First Name</td>
           <td><input type="text" name="client_fname"></td>
       </tr>
       <tr>
           <td>Last Name</td>
           <td><input type="text" name="client_lname"></td>
       </tr>
       <tr>
           <td>E-mail</td>
           <td><input type="text" name="client_email"></td>
       </tr>
       <tr>
           <td>Start Date</td>
           <td><input type="text" name="client_number"></td>
       </tr>
       <tr>
           <td>End Date</td>
           <td><input type="text" name="client_number"></td>
       </tr>
   </table>
</p></fieldset>
    </form>
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
        $query = "SELECT * FROM client WHERE clientID LIKE '%$search%'
        ORDER BY clientID ASC";
        $results = mysqli_query($conn, $query)
        or die("Could not retrieve the data!");
        //extract the data 
        echo "<ol>";
        while ($row = mysqli_fetch_array($results)){
            echo "<li>";
            echo $row['clientID'];
            echo "</li>";
        }
        echo "</ol>";
        //close the connection to the database
        mysqli_close($conn);
    }
    ?>

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