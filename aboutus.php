<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>About Us</title>
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

<style>

.column {
    /*controls column in aboutus page*/
    float: left;
    width: 50%;
    margin-bottom: 16px;
    padding: 0px 8px;
    }
</style>

</head>
<body>
  <!-- general navigation code  -->
<!-- <div class="nav">
<table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
                <td><a href="adminhomepage.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="adminclients.php"><i class="fas fa-user"></i> Clients</a></td>
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

<div class="about-section">
<fieldset>
  <h2>About Us </h2>
  <p>Raiders is an information systems development team established in 2020.</p>
  <p> Our companys main objective is to 
   assist organizations with all their computer system needs. For Hamba Kahle Transport that means implementing
   a computer based management services that is able to perform various tasks to help Hamba Kahle be the very best 
   that they can be.  </p>


<h3 style="text-align:center">Our Team</h3>


<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Minali Harjivan Chouhan</h2>
        <p class="title">Project Manager</p>
        <a href = "mailto: minali.chouhan@gmail.com">minali.chouhan@gmail.com</a>
      </div>
    </div>
  </div>
  
  

<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Mercilove Xerinda</h2>
        <p class="title">System Analyst</p>
        <a href = "mailto: mercilove.j.xerinda@gmail.com">mercilove.j.xerinda@gmail.com</a>
      </div>
    </div>
  </div>
  </div>


  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Tshegofatso Molobe</h2>
        <p class="title">System Tester</p>
        <a href = "mailto: tmolobe15@gmail.com">tmolobe15@gmail.com</a>
      </div>
      </div>
    </div>
 
  
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Liam Searle</h2>
        <p class="title">Software Developer</p>
        <a href = "mailto: liamsearle7@gmail.com">liamsearle7@gmail.com</a>
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
        <td><a href="aboutus.php">About Us</a> | </td>
            <td><a href="faq.php">FAQs</a> | </td>
            <td><a href="legal.php">Legal</a> | </td>
            <td>&copy; Copyright 2020 Raiders</td>
        </tr>
    </table>
  </nav>
</div>


</body>
</html>