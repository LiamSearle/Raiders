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
    <h3 style="text-align:left">PASSENGERS LUGGAGE:</h3>
<p style="text-align:left">Each passenger is permitted to take free of charge, at own risk, 
two suitcases not exceeding 80cm x 60cm x 30cm in size, of a total mass not exceeding 20kg.
 Raiders has the right to refuse the carriage of luggage that does not comply with these conditions. 
Excess luggage will only be accommodated subject to space availability and will be incur an additional charge per kilogram specified at the terminal offices.
</br></p></fieldset>
<fieldset>
<h3 style="text-align:left">Smoking:</h3>
<p style="text-align:left">
It is an offence to smoke on our coaches.  This includes electronic cigarettes.  
</p>
</fieldset>
<fieldset>
<h3 style="text-align:left">INSURANCE:</h3>
<p style="text-align:left">
Raiders does not provide general insurance cover for its passengers, 
their property or luggage. It is the responsibility of the passenger to ensure that he/she is adequately insured.
</p>
</fieldset>
<fieldset>
<h3 style="text-align:left">ALCOHOL/ DRUGS:</h3>
<p style="text-align:left">
Alcohol may not be consumed on Raiders and intoxicated passengers will not be conveyed. Any intoxicated passenger found on board will be instructed to disembark immediately. 
Strictly no drugs.
</p>
</fieldset>
<fieldset>
<h3 style="text-align:left">RESTRICTIONS:</h3>
<p style="text-align:left">
No standing passengers shall be conveyed. Passengers may not lie or sit in the aisle or toilet of the coach. 
No luggage may be stowed in the aisle or toilet of the coach.
</p>
</fieldset>
<fieldset>
<h3 style="text-align:left">Privacy and Security: </h3>
<p style="text-align:left">
Using a credit card to pay for a booking is safe. 
All personal and credit card information is encrypted through secure server software to prevent any third party access to your data.
 All historical data is held in a secure environment. 
All information requested for an internet booking is required solely to process the reservation. 
Your information will not be sold or made available to third parties.
</p>
</fieldset>

<fieldset>
<h3 style="text-align:left">Contact Us/ Feedback: </h3>
<p style="text-align:left">
You may get in contact with us at any time. 
Enquiries and complaints may be submitted via the website,
Raiders Customer Care Centre and any Raiders Offices Nationwide. 
24 Hour Customer Care Support is available via our Contact Centre on 087 375 0352/ 046 611 8000. 
Official complaints must be raised and submitted within 14 days of travel.
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
                    <td><a href="clientterms.php">Terms & Conditions</a> | </td>
                    <td><a href="clientcontactus.php">Contact Us</a></td>
                    <td>&copy; Copyright 2020 Raiders</td>
                </tr>
            </table>
        </nav>
    </div>


</body>

</html>