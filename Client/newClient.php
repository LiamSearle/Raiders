<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Clients-should delete</title>
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
    <form action="clientlogin.php" method="post"> <fieldset>
   
    
 <h1> Register</h1>  
   <fieldset><p>Please fill in this form to create an account
   <table>
       <tr>
           <td>First Name</td>
           <td><input type="text" name="client_fname" placeholder = "Enter name" required></td>
       </tr>
       <tr>
           <td>Last Name</td>
           <td><input type="text" name="client_lname" placeholder = "Enter surname" required></td>
       </tr>
       <tr>
           <td>E-mail</td>
           <td><input type="text" name="client_email" placeholder = "Enter email" required></td>
       </tr>
       <tr>
           <td>Contact Number</td>
           <td><input type="text" name="client_contact" placeholder = "Contact Number" required></td>
       </tr>
       <tr>
           <td>Password</td>
           <td><input type="text" name="client_password" placeholder = "Enter Password" required></td>
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
      <td><button type="submit" class="signupbtn">Sign Up</button><button type="button" class="cancelbtn">Cancel</button></td>
    </tr>  
  
   </table>
</p></fieldset>
    </form>
    <?php
    //add database credentials 
    require_once("config.php");
    //checking if the searching form has been submitted 
    if (isset($_REQUEST['submit'])) {
        //get the value from the form
        $name = $_REQUEST['client_fname'];
        $lname= $_REQUEST['client_lname'];
        $email = $_REQUEST['client_email'];
        $contact= $_REQUEST['client_contact'];
        $password= $_REQUEST['client_password'];
        $repeat= $_REQUEST['client_repeat'];
        //make the connection to database
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
        or die("Could not connect to the database!");
        //issue out the query instructions
        $query = "INSERT INTO client (firstname, lastName, emailAddress, contactNumber, passwords) 
                    values ('$name', '$lname', '$email', '$contact', '$password') ";
        $results = mysqli_query($conn, $query)
        or die("Could not retrieve the data!");
        //extract the data 
        if (mysqli_query($conn, $sql)) {
            echo "New client created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        //close the connection to the database
        mysqli_close($conn);
    }
    ?>
  

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