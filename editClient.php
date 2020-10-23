<?php
session_start();
?>
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

        <!-- logout button code -->
        <script>
        function logOut() {
            var retVal = confirm("Are you sure you'd like to log out?");
            if (retVal == true) {
                window.location = ("clientlogin.php");
                return true;
            } else {
                //stays on the same page
                return false;
            }
        }
    </script>
</head>

<div class="nav">
        <table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
                <td><a href="clientcreatebooking.php"><i class="fas fa-home"></i> Home</a></td>
                <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
                <td><a href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td>
                    <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                </td>
            </tr>
        </table>
    </div>


<body>
<fieldset style="margin: auto; width: 30%;">
    <form action="editClient.php" method="post">
 
            <p>Please fill in this form to update details
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
                        <td></td>
                        <td><input type="submit"  name="edit" value="Confirm">
                        <button onclick="myFunction()">Cancel</button>
                    </tr>

                </table>
            </p>

    </form>

    <p><?php
        //add database credentials 
        //checking if the searching form has been submitted 
        if (isset($_POST['edit'])) {
            require_once("config.php");
            //get the value from the form
            // $clientID = $_POST['clientID'];
            $id = $_SESSION['clientID'];
            $name = $_POST['client_fname'];
            $lname = $_POST['client_lname'];
            $email = $_POST['client_email'];
            $contact = $_POST['client_contact'];
            //$repeat= $_REQUEST['client_repeat'];
            //make the connection to database
            $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                or die("Could not connect to the database!");
            //issue out the query instructions
            $query ="UPDATE clients 
					SET	firstName = '$name',  lastName = '$lname', emailAddress = '$email', contactNumber = '$contact'
                    WHERE clientID = '$id'";
            $results = mysqli_query($conn, $query)
                or die("Could not retrieve the data!");
            //extract the data 
            echo "Details updated successfully";
            //close the connection to the database
            // mysqli_close($conn);
            header("Location:clientdetails.php");
        }
        ?>
</fieldset>
        <script>
        function myFunction() {
            location.replace("clientdetails.php")
            }
        </script>


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