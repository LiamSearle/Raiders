<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clients</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>

  <style>
          /* Style the tab */
      .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        position: absolute;
        top: 100px;
      }

      /* Style the buttons that are used to open the tab content */
      .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
      }

      /* Change background color of buttons on hover */
      .tab button:hover {
        background-color: #ddd;
      }

      /* Create an active/current tablink class */
      .tab button.active {
        background-color: #ccc;
      }

      /* Style the tab content */
      .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
      }

      #clientTable{
        margin-left:auto;
        margin-right:auto;
      }

      #clientTable th,td,tr {
        text-align: left;
        padding: 5px;
      }   
    
      #clientHeader{
        position:relative;
        top:20px;
      }
  </style>

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
                <td><a href="bookingreq.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
                <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td><form action="search.php" method="post">
                <i class="fas fa-search"></i>
                <input type="search" name="txtSearch">
                <input type="submit" name="submit" value="Go">
                </form>
                <td><div class="button">
                    <input type="submit" name="submit" value="Log Out" onclick="logOut();">
                </div></td>
            </tr>
</table>      
</div>

<h2 id="clientHeader">Client ID:
<input type="text" name="clientID" id="clientID">
<input type="submit" name="submit" value="Search"></h2>
 
<fieldset>
<legend>Booking ID: ???</legend>
<table id="clientTable">
  <tr>
    <th>First Name:</th>
    <th><input type="text" name="firstName"></th>
    <th>Last Name: </th>
    <th><input type="text" name="lastName"></th>
  </tr>

  <tr>
    <th>Starting Destination: </th>
    <th><input type="text" name="startDestination"></th>
    <th>Start Date: </th>
    <th><input type="text" name="startDate"></th>
  </tr>

  <tr>
    <th>Ending Destination: </th>
    <th><input type="text" name="endDestination"></th>
    <th>End Date: </th>
    <th><input type="text" name="endDate"></th>
  </tr>

  <tr>   
    <th>E-mail: </th>
    <th><input type="text" name="email"></th>
    <th>Contact Number: </th>
    <th><input type="text" name="contactNumber"></th>
    <th>Number of Passengers: </th>
    <th><input type="text" name="passengerNumber"></th>
  </tr>
</table>
</fieldset>

  <!-- <div>
  Tab links 
<div class="tab">
  <button class="tablinks" onclick="showClient(event, 'return')">Returning Client</button>
  <button class="tablinks" onclick="showClient(event, 'new')">New Client</button>
  
</div>

 Tab content 
<div id="return" class="tabcontent">
  <h3>This is for returning Clients</h3>
  <p>Bla bla bla.</p>
</div>

<div id="new" class="tabcontent">
  <h3>This is for new Clients</h3>
  <p>Whatever.</p>
</div>

  </div>

<script>
  function showClient(evt, clientType) {
  // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(clientType).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script> 
-->
 
 <!-- general footer code  -->
 <div class="footer"> 
  <nav>
    <table>
        <tr>
            <td><a href="aboutus.php">About Us</a></td>
            <td><a href="#######">FAQs</a></td>
            <td><a href="#######">Legal</a></td>
            <td><a href="#######">Terms & Conditions</a></td>
        </tr>
    </table>
  </nav>
</div>    

</body>
</html>