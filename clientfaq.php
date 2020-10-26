<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/small_logo.png" type="image/gif" sizes="100x100">
    <title>Frequently Asked Questions</title>
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


<body>
    <div class="nav">
        <table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
                <td><a href="clientcreatebooking.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="clientdetails.php"><i class="fas fa-user"></i> Details</a></td>
                <td><a href="clientbooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td>
                    <div style = "position:relative; left:1350px; top:2px;" >
                        <form action="clientlogin.php" class="Logout">
                        <input type="button" name="submit" value="Logout" onclick="logOut();">
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <br>
    <h1> Frequently Asked Questions </h1>
    <fieldset style="margin: auto; width: 75%;">
    <h2 style="text-align:centre">General</h2>
    <p style="text-align:left"><b><u> Why is the transport late?</u></b></br>
    Raiders makes every effort to keep to schedule. We really do. 
    However, sometimes our service is disrupted and the schedule changes because of uncontrollable circumstances such as road conditions, 
    unexpectedly high passenger loads or weather. For these rare occasions when we are late, 
    we cannot say sorry enough </p>

    <p style="text-align:left"><b><u> How do I file a complaint?</u></b></br>
    We sincerely apologise if you’re looking to file a complaint and we will certainly do our very best to resolve the issue. 
    Please feel free to contact the Customer Care line on +27 (0)46 611 8000 or send us your complaint on Facebook, direct to our wall or inbox.

    Rest assured, all complaints will be handled with care and resolved. </p>

    <p style="text-align:left"><b><u> May I bring my on food and drink onboard?</u></b></br>
    Yes, absolutely! However, no alcohol will be allowed to be consumed on board – none. 
    Raiders has a strict zero tolerance policy in this regard.</p>

    <p style="text-align:left"><b><u>Are pets allowed on the shuttle?</u></b></br>
    No animals are allowed in our vehicles, not because we don’t love them and think they’re super cute, 
    but because that’s just the rules. Of course, trained guide dogs accompanying the visually impaired will be allowed.
    </p>

    <p style="text-align:left"><b><u>Are all your drivers qualified ?</u></b></br>
    Absolutely! Safety is one of our proudest attributes. 
    All drivers and crew are carefully selected and professionally trained to meet all the required safety and service standards. 
    All drivers are also sent for refresher training on a regular basis and undergo medical examinations every year.
    </p>

    <p style="text-align:left"><b><u>I have special medical requirements. Will I be able to travel?</u></b></br>
    Passengers travelling with any medical condition must kindly contact Customer Care ahead of departure 
    or communicate this to us when the booking is being made. 
    Passengers are advised to keep all medication (chronic or not) with them at all times in the cabin.
    Medication must not be placed in the luggage compartment.
    </p>

    <p style="text-align:left"><b><u>Can I travel with valuable items?</u></b></br>
    Of course, but please – be careful! Passengers should make sure to safeguard all their personal belongings and valuable items. 
    These must be kept inside the coach cabin at all times.
    Raiders will not accept any liability for the loss of any such items.
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