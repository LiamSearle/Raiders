<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Help</title>
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
     <!-- general navigation code  -->
<!-- <div class="nav">
<table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
                <td><a href="clienthomepage.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="adminclients.php"><i class="fas fa-user"></i> Clients</a></td>
                <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>      
                <td>
                    <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                </td>
            </tr>
        </table>
</div> -->

<div class="topleft">
<a href="javascript:history.back()">  Back</a>
</div>

<!-- populating the help section with information -->
<fieldset>
<h2>Help</h2>
<p style="text-align:left">
<br><b><u> Do I need to Register?</u></b></br>
No, all employees once employed by the company will have their details automatically entered into the database. 
You will receive log-in credentials that can then be used to log-in to the system. 

<p style="text-align:left"><u>Administrators</u></p>
<p style="text-align:left"> Administrators receive their log-in credentials once employed by the company. After logging in, they are able to 
view, confirm or reject and assign all relevant information that is required for a booking to be created. Administrators also have access to view
all outgoing bookings, the status of drivers and vehicles. 
<a href="faq.php"> Further information can be found here </a>
</p>
<p style="text-align:left"><u>Drivers</u></p>
<p style="text-align:left"> Drivers receive their log-in credentials once employed by the company. Drivers are able to use the system to see 
what booking they are attached to as well as being able to check and then book available depot rooms should they choose too.
</p>
<p style="text-align:left"><u>Depot Admin</u></p>
<p style="text-align:left"> Depot Admin receive their log-in credentials once employed by the company. They are able to check and report on depot details including
how many depot rooms are available. Depot Admin also ensure that rooms are ready for occupation by drivers. 
</p>
<p style="text-align:left"><u>HR Manager</u></p>
<p style="text-align:left">


</p>


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