<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <title>Legal</title>
    <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
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
<p style="text-align:left;">
<a href="javascript:history.back()" ><input type="button" name="back" value="Back"></a>
  </p>

  <h1>Legal</h1>
    <fieldset>


        <p style="text-align:left">
            <b>User Agreement</b><br></br>
            All direct consumers of Hamba Kahle's basic services are subject to the terms and conditions contained in the User Agreement.
            The User Agreement is a legal contract between Hamba Kahle Transport and the employees that contains the rights, duties and
            obligations of Hamba Kahle and the employee.

            <br></br>

            <b>Acceptable Use Policy</b><br></br>
            Hamba Kahle's Usage Policy is designed to protect Hamba Kahle, its employees
            and others from illegal, malicious, damaging and inappropriate behavior by Users of Hamba Kahle's services.
            All users of Hamba Kahle's services are subject to the Usage Policy.
            The Usage Policy lists activities that are prohibited on Hamba Kahle's services, such as hacking and spamming.

            <br></br>

            <b>Privacy Notice</b><br></br>
            Hamba Kahle's Privacy Notice covers treatment of information
            that Hamba Kahle may collect from users of its products and services and from visitors to the Hamba Kahle site.
            <br></br>

        </p>
    </fieldset>





    <!-- general footer code  -->
    <div class="footer">
        <nav>
            <table>
                <tr>
                    <td><a href="aboutus.php">About Us</a> | </td>
                    <td><a href="faq.php">FAQs</a> | </td>
                    <td><a href="legal.php">Legal</a> | </td>
                    <td>&copy; Copyright 2020 Raiders</td>
                </tr>
            </table>
        </nav>
    </div>


</body>

</html>