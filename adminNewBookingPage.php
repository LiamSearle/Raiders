<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings</title>
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
                    <td><a href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
                    <td><a class="active" href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                    <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
                    <td>
                        <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                    </td>
                </tr>
            </table>
</div>


<h2 id="bookingHeader">Booking ID:
<input type="text" name="bookingID" id="bookingID">
<input type="submit" name="submit" value="Search"></h2>
 
<fieldset style="margin: auto; width: 50%;">
<legend>New Booking: <?php $_REQUEST['id']; ?></legend>

<form action="adminNewBookingPage.php" method="POST">
  <table id="clientTable" style="margin: auto; width: 50%;">
  <div class="inputLabel">
        <label for="clientID">Client ID </label>
        <input id="clientID" type="text">
        </div>
        
        <br><br>

        <div class="inputLabel">
            <label for="driver">Driver </label>
            <select id="driver" name="driver">
                    <option value="Driver 1 From DB">Driver 1 From DB</option>
                    <option value="Driver 2">Driver 2</option>
                    <option value="Driver 3">Driver 3</option>
                    <option value="Etc.">Etc.</option>
                </select>
        </div>


        
            
        <br><br>

        <div class="inputLabel">
        <label for="driver">Vehicle </label>
            <select id="vehicle" name="vehicle">
                <option value="Vehicle 1 From DB">Vehicle 1 From DB</option>
                <option value="Vehicle 2">Vehicle 2</option>
                <option value="vehicle 3">Vehicle 3</option>
                <option value="Etc.">Etc.</option>
        </select>
        </div>
        
        <br><br>

        <input type="submit" value="Create Booking">
      </table>
      <button type="submit" name="go" style="margin: auto; width: 15%; padding: 10px;">Confirm Details</button>
    </form>
    <br>
  
    
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