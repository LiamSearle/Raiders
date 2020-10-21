<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
    <title>Terms & Conditions</title>
    <!-- logout button code -->
    <script>
        function logOut() {
            var retVal = confirm("Are you sure you'd like to log out?");
            if (retVal == true) {
                window.location = ("raiders.php");
                return true;
            } else {
                //stays on the same page
                return false;
            }
        }
    </script>

</head>


<body>
    <div class="nav">
        <table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
                <td><a href="clientcreatebooking.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
                <td><a href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td>
                    <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                </td>
            </tr>
        </table>
    </div>
    <h2>Terms and Conditions</h2>
    <fieldset>
    <h3 style="text-align:left">PASSENGERS LUGGAGE</h3>
<p style="text-align:left">Each passenger is permitted to take free of charge, at own risk, 
two suitcases not exceeding 80cm x 60cm x 30cm in size, of a total mass not exceeding 20kg.
 Raiders has the right to refuse the carriage of luggage that does not comply with these conditions. 
Excess luggage will only be accommodated subject to space availability and will be incur an additional charge per kilogram specified at the terminal offices.
</br></p></fieldset>
<fieldset>
<h3 style="text-align:left">Smoking</h3>
<p style="text-align:left">
It is an offence to smoke on our coaches.  This includes electronic cigarettes.  
</p>
</fieldset>
    <!-- general footer code  -->
    <div class="footer">
        <nav>
            <table>
                <tr>
                    <td><a href="clientaboutus.php">About Us</a> | </td>
                    <td><a href="clientfaq.php">FAQs</a> | </td>
                    <td><a href="clientlegal.php">Legal</a> | </td>
                    <td><a href="clientterms.php">Terms & Conditions</a></td>
                    <td>&copy; Copyright 2020 Raiders</td>
                </tr>
            </table>
        </nav>
    </div>


</body>

</html>