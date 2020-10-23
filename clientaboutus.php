<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
  <title>About Us</title>
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
        <td><a href="clienthome.php"><i class="fas fa-home"></i>Home</a></td>
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
  <h1>About Us </h1>
    <fieldset>
      <p><b>Raiders is an information systems development team established in 2020.</b></p>
      <p>We are the shuttle provider in South Africa with full online booking capability,
        providing you with real time e-mail and SMS confirmations of your booking which ensures
        that your booking experience does not have to be difficult, unreliable and complicated.
        It is the road at your fingertips.</p>

    <p style="text-align:left"><b> Putting people in motion</b></br>
    Good things happen when people can move, whether across town or toward their dreams. Opportunities appear, open up, become reality. 
   What started as a way to tap a button to get a ride has led to billions of moments of human connection as people around
    the world go all kinds of places in all kinds of ways with the help of our technology.

    <p style="text-align:left"><b> Present and the future</b></br>
    In addition to giving riders a way to get from point A to point B, 
    we're working to bring the future closer with self-driving technology and urban air transport, helping people order food quickly and affordably,
     removing barriers to healthcare, creating new freight-booking solutions, 
    and helping companies provide a seamless employee travel experience.
  


 
    <p style="text-align:left"><b> Safety</b></br>
  Whether you’re in the back seat or behind the wheel, 
  your safety is essential. We are committed to doing our part, and technology is at the heart of our approach. 
  We partner with safety advocates and develop new technologies and systems to help improve safety and help make it easier for everyone to get around.
  </div>
  </fieldset>

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