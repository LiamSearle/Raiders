<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <title>Contact Us</title>
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

  <style>
    .column {
      /*controls column in aboutus page*/
      float: left;
      width: 50%;
      margin-bottom: 16px;
      padding: 0 8px;
    }
  </style>

</head>

<body>
  <!-- general navigation code  -->
  <div class="nav">
    <table>
      <tr>
        <td><img src="images/logoo.png" height="50px"></td>
        <td><a href="clientcreatebooking.php"><i class="fas fa-home"></i>Home</a></td>
        <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
        <td><a href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
        <td>
                <div style = "position:relative; left:1350px; top:2px;" >
                    <form action="clientlogin.php" class="Logout">
                    <input type="button" name="submit" value="Logout" onclick="logOut();">
                    </form>
                </div>
        </td>
    </table>
  </div>
  <br>
  <div class="about-section">
  <h1>Contact Us </h1>

  <fieldset style="margin: auto; width: 30%;">
<h3 style="text-align:centre"> CUSTOMER CARE CENTRE</h3>

<p style="text-align:left">
 <b>Contact numbers:</b>
 <br>
046 611 8000
<br> 
087 375 0352
</p>
<p style="text-align:left"><b>Address:</b><br>
29 Hill Street
<br>
Grahamstown
<br>
6139
</p>

<p style="text-align:centre">
24 Hour Online Service 
</p> 
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