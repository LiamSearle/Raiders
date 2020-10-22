<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
    <title>Legal</title>
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
                <td><a href="clientcreatebooking.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td>
                    <input type="submit" id="button" name="submit" value="Log Out" onclick="logOut();">
                </td>
            </tr>
        </table>
    </div>
<h2>Privacy Policy</h2>

    <fieldset style="margin: auto; width: 75%;">
    <p style="text-align:left"><b> Introduction</b></br>
This Privacy Policy is subject to Raiders terms and conditions and all definitions contained in such terms and conditions shall apply 
equally to this Privacy Policy.
Your privacy, as a visitor of our web site is important to us. By continuing to use this web site, 
you agree to the terms and conditions set out in this Privacy Policy. 
Please note that by submitting information via this web site, you consent to the collection, collation, 
processing, and storing of such information and the use and disclosure of such information in accordance with this Privacy Policy. 
We recommend that you read this Privacy Policy together with our terms and conditions prior to submitting information to this web site.
Amendments to this Privacy Policy may be made from time to time and any such amendments will be made available on this web site.
</fieldset>
<fieldset style="margin: auto; width: 75%;">
    <p style="text-align:left"><b> Information collected</b></br>
We collect and store the following personal information of users of this web site: information necessary for our legitimate business 
interest and the categories of personal information identified in the Electronic Communications and Transactions Act 25 of 2002 (“the ECT Act”). 
This may include (amongst other things) the user´s name, identity number, telephone number, age, disability and preferences; 
and information automatically provided (e.g. cookies and server logs) which may include, amongst other things,
 information pertaining to a user´s use and navigation of this Web Site, IP addresses and the duration and frequency of a user’s visits to this web site. 
 Cookies are pieces of information that a web site transfers to a user´s hard drive for record-keeping purposes. 
 Cookies are not harmful to your computer and do not carry viruses.
 </fieldset>
 <fieldset style="margin: auto; width: 75%;">
    <p style="text-align:left"><b> Use of information</b></br>
The personal information collected on this web site may be used to provide and improve services to you and to operate 
and improve browsing and interaction via this web site. In addition, we may use this information to provide marketing information to you.
Personal information which is collected from you will be stored and processed in the Republic of South Africa. Personal information will not be 
traded, sold or leased to third parties. While we will attempt not to disclose any of your personal information to third parties, except when we have your 
permission or for purposes of our legitimate business interests, we do not guarantee that your personal information will not be shared with third parties 
without your permission.
You agree that your personal information may be shared with (amongst others) the following parties:
government and law enforcement agencies; credit and other payment card providers; where the law requires that we disclose your personal information to a party; 
where we have reason to believe that a disclosure of personal information is necessary to identify, 
contact or bring legal action against a party who may be in breach of the terms and conditions or may be causing injury to or interference with 
(either intentionally or unintentionally) our rights or property, other users, or anyone else that could be harmed by such activities.
</fieldset>
<fieldset style="margin: auto; width: 75%;">
    <p style="text-align:left"><b> Security</b></br>
All reasonable steps will be taken to ensure the integrity, security and confidentiality of your personal information. However, 
while we exercise great care in providing secure transmission of your personal information, we cannot guarantee the security of any information transmitted 
via the internet to or from this web site and you accordingly agree that you transmit such information at your own risk.
You must ensure that your username and passwords or personal identification numbers are not revealed to any other persons. 
Should you divulge such information, we accept no liability for any resulting losses.
</fieldset>
<fieldset style="margin: auto; width: 75%;">
    <p style="text-align:left"><b>Links</b></br>
Please note that if you are directed to or make use of any external links on this Web Site to another web site, 
such web sites are not subject to this Privacy Policy.
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