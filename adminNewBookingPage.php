<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
          window.location.reload(); //stays on the same page
           return false;
        }
     } 
</script>

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
      .container {
        width: 500px;
        clear: both;
      }

      .inputLabel {
       left: 10px;
       width: 100%;
       clear: both;
       display: inline-block;
      }
  </style>

</head>
<body>
<!-- general navigation bar code   -->
<div class="nav">
    <table>
                <tr>
                    <td><img src="images/logoo.png" height="50px"></td>
                    <td><a href="bookingreq.php"><i class="fas fa-home"></i>Home</a></td>
                    <td><a href="clients.php"><i class="fas fa-user"></i> Clients</a></td>
                    <td><a class="active" href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
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




<div 
    style=  "width: 100px;
            border: 10px solid white;
            padding:20px;
            margin: 20px;
            background: white;">
    New Booking
</div>

<div class="container" style="width: 400px;
            border: 10px solid white;
            padding:20px;
            margin: 20px;
            background: white;">
    <form action="" method="POST">
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
  </form>
</div>



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