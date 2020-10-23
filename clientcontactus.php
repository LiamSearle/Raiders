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
          <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
        </td>
      </tr>
    </table>
  </div>
  <br>
  <div class="about-section">
  <h1>Contact Us </h1>
   
    <fieldset>
      <h2 style="text-align:center">Our Team</h2>


      <div class="row">
        <div class="column">
          <div class="card">
            <div class="container">
              <h2>Minali Harjivan Chouhan</h2>
              <p class="title">Project Manager</p>
              <a href="mailto: minali.chouhan@gmail.com">minali.chouhan@gmail.com</a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="column">
            <div class="card">
              <div class="container">
                <h2>Mercilove Xerinda</h2>
                <p class="title">System Analyst</p>
                <a href="mailto: mercilove.j.xerinda@gmail.com">mercilove.j.xerinda@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="container">
              <h2>Tshegofatso Molobe</h2>
              <p class="title">System Tester</p>
              <a href="mailto: tmolobe15@gmail.com">tmolobe15@gmail.com</a>
            </div>
          </div>
        </div>


        <div class="column">
          <div class="card">
            <div class="container">
              <h2>Liam Searle</h2>
              <p class="title">Software Developer</p>
              <a href="mailto: liamsearle7@gmail.com">liamsearle7@gmail.com</a>
            </div>
          </div>
        </div>
      </div>

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
  <fieldset>
<h3 style="text-align:left"> CUSTOMER CARE CENTRE</h3>
<p style="text-align:left">
<b>24 hours services </b>
</p> 
<p style="text-align:left">
 <b>Contact number:</b>
 <br>
 046 611 8000 or 087 375 0352
</p>
<h4 style="text-align:left"> Address:</h4>
<p style="text-align:left">
29 Hill Street
</p>
<p style="text-align:left">
Grahamstown
</p>
<p style="text-align:left">
6139
</p>
</fieldset>
 
</body>

</html>