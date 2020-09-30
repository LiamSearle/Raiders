<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Home Page</title>

    <!-- logout button code -->
<script>
     function logOut() {
        var retVal = confirm("Are you sure you'd like to log out?");
        if( retVal == true ) {
          window.location=("clientlogin.php"); 
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
                <td><a class="active" href="clienthome.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
                <td><a href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td><div>                 
                <form action = "clientlogin.php" class = "Logout">
                <input type="button" name="submit" value="Logout" onclick="logOut();">
                 </form>
                </div></td>
            </tr>
        </table>
</div>
    <br>
    <h2>Booking Requests</h2>

<form action="clienthome.php" method="post">
    <a href="clientcreatebooking.php"><input type="button" value="Create booking request"></a>
</form>

 <!-- general footer code  -->
 <div class="footer"> 
  <nav>
    <table>
        <tr>
            <td><a href="clientaboutus.php">About Us</a></td>
            <td><a href="clienthelp.php">Help</a> | </td>
            <td><a href="clientfaq.php">FAQs</a></td>
            <td><a href="clientlegal.php">Legal</a></td>
            <td><a href="clientterms.php">Terms & Conditions</a></td>
            <td>&copy; Copyright 2020 Raiders</td>
        </tr>
    </table>
  </nav>
</div>    
    
    
</body>
</html>