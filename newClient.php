<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Clients</title>
    <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
    <style>
        /* Set a style for all buttons */
    </style>
</head>

<body>
    <form action="newClient.php" method="post">
        <h1><img src="images/small_logo.png" width="80px"><br>
            Register</h1>
        <fieldset style="margin: auto; width: 30%;">
            <p>Please fill in this form to create an account
                <table>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="client_fname" placeholder="Enter name" required></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="client_lname" placeholder="Enter surname" required></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" name="client_email" placeholder="Enter email" required></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><input type="text" name="client_contact" placeholder="Contact Number" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="client_password" placeholder="Enter Password" required></td>
                    </tr>
                    <tr>
                        <td>Remember me</td>
                        <td> <input type="checkbox" name="remember" style="margin-bottom:15px"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="signupbtn" name="submit" value="Sign Up">
                        <button onclick="Cancel()">Go Back</button></td>
                    </tr>

                </table>
            </p>
        </fieldset>
    </form>
    <p><?php
        //add database credentials 
        //checking if the searching form has been submitted 
        if (isset($_POST['submit'])) {
            require_once("config.php");
            //get the value from the form
            $name = $_POST['client_fname'];
            $lname = $_POST['client_lname'];
            $email = $_POST['client_email'];
            $contact = $_POST['client_contact'];
            $password = $_POST['client_password'];
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
            echo "New client created successfully";
            //close the connection to the database
            mysqli_close($conn);
            header("Location:clientlogin.php");
        }
        ?>
<script>
function Cancel() {
  window.history.back();
}
</script>
        </p>


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