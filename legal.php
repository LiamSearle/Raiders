<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Legal</title>
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
<!-- <div class="nav">
<table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
                <td><a href="homepage.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
                <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>  
                <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>    
                <td>
                    <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                </td>
            </tr>
        </table>
</div> -->

<div class="topleft">
<a href="javascript:history.back()">  Back</a>
</div>

<fieldset>
<h2>Legal</h2>

<p style="text-align:left">
<b>User Agreement</b><br></br>
All direct consumers of Hamba Kahle's basic services are subject to the terms and conditions contained in the User Agreement.
The User Agreement is a legal contract between Hamba Kahle Transport and the employees that contains the rights, duties and 
obligations of Hamba Kahle and the employee.

<br></br>

<b>Acceptable Use Policy</b><br></br>
Hamba Kahle's Usage Policy is designed to protect Hamba Kahle, its employees
and others from illegal, malicious, damaging and inappropriate behavior by Users of Hamba Kahle's services. 
All users of Hamba Kahle's services are subject to the Usage Policy. 
The Usage Policy lists activities that are prohibited on Hamba Kahle's services, such as hacking and spamming.

<br></br>

<b>Privacy Notice</b><br></br>
Hamba Kahle's Privacy Notice covers treatment of information 
that Hamba Kahle may collect from users of its products and services and from visitors to the Hamba Kahle site.
<br></br>

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