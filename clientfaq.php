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
                    <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                </td>
            </tr>
        </table>
    </div>


    
    <h2> Frequently Asked Questions </h2>
    <fieldset style="margin: auto; width: 75%;">
    <h3 style="text-align:left">General</h3>
    <p style="text-align:left"><b><u> WHY IS THE TRANSPORT LATE?</u></b></br>
    Raiders makes every effort to keep to schedule. We really do. 
    However, sometimes our service is disrupted and the schedule changes because of uncontrollable circumstances such as road conditions, 
    unexpectedly high passenger loads or weather. For these rare occasions when we are late, 
    we cannot say sorry enough </p>
  </fieldset>
  <fieldset style="margin: auto; width: 75%;">
    <p style="text-align:left"><b><u> HOW DO I FILE A COMPLAINT?</u></b></br>
    We sincerely apologise if you’re looking to file a complaint and we will certainly do our very best to resolve the issue. 
    Please feel free to contact the Customer Care line on +27 (0)46 611 8000 or send us your complaint on Facebook, direct to our wall or inbox.

    Rest assured, all complaints will be handled with care and resolved. </p>
  </fieldset>
  <fieldset style="margin: auto; width: 75%;">
    <p style="text-align:left"><b><u> MAY I BRING MY OWN DRINK AND FOOD ONBOARD?</u></b></br>
    Yes, absolutely! However, no alcohol will be allowed to be consumed on board – none. 
    Raiders has a strict zero tolerance policy in this regard.</p>
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