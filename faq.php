<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Frequently Asked Questions</title>
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

<fieldset style="margin: auto; width: 75%;">
<h2> Frequently Asked Questions </h2>
<h3 style="text-align:left">General</h3>
<p style="text-align:left"><b><u> Do I need to Register?</u></b></br>
No, all employees once employed by the company will have their details automatically entered into the database. 
You will receive log-in credentials that can then be used to log-in to the system. </p>

<p style="text-align:left"><b><u> What can I, the user do with the system? </u></b></br>
The easiest way to answer this question would be to break it down employee by employee.
<br></br>
Administrators: Are able to view, confirm or reject and assign all relevant information that is required for a booking to be created. Administrators also have access to view
all outgoing bookings, the status of drivers and vehicles. 
<br></br>
Drivers: Are able to use the system to see their driving schedule. They are also able to check and then book available depot rooms should they choose too.
<br></br>
Depot Admin: Are able to check and report on depot details including how many depot rooms are available. Depot Admin also ensure that rooms are ready for occupation by drivers. 
<br></br>
HR Manager: Are able to see where drivers are at all times. They are also able to view reports on all the employees and vehicles of the company.
</p>

<h3 style="text-align:left">Administrators</h3>
<p style="text-align:left"><b><u>How do I create a new booking?</u></b></br>
Once logged in the system will direct you to the homepage that shows all incoming booking requests from clients. 
Here, you can click on a specific booking that will take you to the client information verification page where you can check if 
all the information submitted by the client is valid. If it is, you can then proceed to the assigning page where you must assign a 
an appropriate driver and vehicle to the booking. Clicking on 'Create Booking' will assign these details and add the booking to system. </p>

<p style="text-align:left"><b><u>Can I see all the bookings?</u></b></br>
Yes, you can by clicking on the 'Reports' tab on the top navigation bar. On the reports page, you can see all the bookings made as well as
drivers and vehicles that have been assigned to specific bookings.
</p>

<h3 style="text-align:left">Drivers</h3>
<p style="text-align:left"><b><u>Can I see my driving schedule?</u></b></br>
Yes, infact that is the first thing that you can see after completing the logging in process.
</p>

<p style="text-align:left"><b><u>How do I book a depot room?</u></b></br>
Click on the 'Depots' tab on the top navigation bar. You will be taken to a page that has all your information pre-filled, by clicking on <thead>
dropdown menu you can select the depot closest to your final location. If there is a room available, you will recieve confirmation of your booked room 
via the notifications tab.
</p>

<h3 style="text-align:left">Depot Admin</h3>
<p style="text-align:left"><b><u>How do I check on how many depot rooms are available?</u></b></br>
Click on the 'Reports' tab on the top navigation bar. Yu will be taken to a page that has a table with all the depots showing and how many rooms 
are available for occupation.
</p>

<h3 style="text-align:left">HR Managers</h3>
<p style="text-align:left"><b><u>How do I view reports?</u></b></br>
Click on the 'Reports' tab on the top navigation bar. You will then be taken to a page that has a table with all the relevant infromation showing.
</p>
<br></br>

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