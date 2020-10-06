<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Clients</title>
  <style>
  /* Set a style for all buttons */


  </style>
</head>
<body>
<!-- general navigation bar code   -->
<div class="nav">
<table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
         
            </tr>
        </table>
</div>
    <br>
    <form action="newdriver.php" method="post">
   
    
 <h1> Register</h1>  
   <fieldset><p>Please fill in this form to create an account
   <table>
       <tr>
           <td>First Name</td>
           <td><input type="text" name="driver_fname" placeholder = "Enter name" required></td>
       </tr>
       <tr>
           <td>Last Name</td>
           <td><input type="text" name="driver_lname" placeholder = "Enter surname" required></td>
       </tr>
       <tr>
           <td>E-mail</td>
           <td><input type="text" name="driver_email" placeholder = "Enter email" required></td>
       </tr>
       <tr>
           <td>Contact Number</td>
           <td><input type="text" name="driver_contact" placeholder = "Contact Number" required></td>
       </tr>
       <tr>
           <td>Password</td>
           <td><input type="password" name="driver_password" placeholder = "Enter Password" required></td>
       </tr>
      <!-- <tr>
           <td>Repeat Password</td>
           <td><input type="text" name="client_repeat" placeholder = "Repeat Password" required></td>
       </tr> -->
       <tr>
           <td>Remember me</td>
           <td> <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"></td>
       </tr>
     <tr>
      <td></td>
      <td><input type="submit" class="signupbtn" name="submit" value="Sign Up"><button type="button" class="cancelbtn">Cancel</button></td>
    </tr>  
  
   </table>
</p></fieldset>
    </form>
    <p><?php
    //add database credentials 
    //checking if the searching form has been submitted 
    if (isset($_REQUEST['submit'])) {
        require_once("config.php");
        //get the value from the form
        $name = $_REQUEST['driver_fname'];
        $lname= $_REQUEST['driver_lname'];
        $email = $_REQUEST['driver_email'];
        $contact= $_REQUEST['driver_contact'];
        $password= $_REQUEST['driver_password'];
        //$repeat= $_REQUEST['client_repeat'];
        //make the connection to database
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("Could not connect to the database!");
        //issue out the query instructions
        $query = "INSERT INTO clients (firstName, lastName, emailAddress, contactNumber, passwords) 
                    values ('$name', '$lname', '$email', '$contact', '$password') ";
        $results = mysqli_query($conn, $query)
            or die("Could not retrieve the data!");
        //extract the data 
        echo "New driver created successfully";
        //close the connection to the database
        mysqli_close($conn);
        header("Location:driverlogin.php");
    }
    ?></p>
  

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