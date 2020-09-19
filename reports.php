<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demo</title>
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
          <td><a href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
          <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
          <td><a class="active" href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
          <td>
            <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
          </td>      
      </tr>
  </table> 
  </div> 

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