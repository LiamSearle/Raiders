<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8f7b167549.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
    <title>Admin Home Page</title>

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
    <!-- general navigation bar code   -->
    <div class="nav">
        <table>
            <tr>
                <td><img src="images/logoo.png" height="50px"></td>
                <td><a class="active" href="adminhomepage.php"><i class="fas fa-home"></i>Home</a></td>
                <td><a href="adminClients.php"><i class="fas fa-user"></i> Clients</a></td>
                <td><a href="adminNewBookingPage.php"><i class="fas fa-address-book"></i> Bookings</a></td>
                <td><a href="reports.php"><i class="fas fa-list"></i> Reports</a></td>
                <td>
                    <div style = "position:relative; left:1250px; top:2px;">
                        <form action="raiders.php" class="Logout">
                        <input type="button" name="submit" value="Logout" onclick="logOut();">
                        </form>
                    </div>
                </td>
            </tr>
        </table>
        <!-- Creating the incoming booking requests to be clicked on  -->
        <?php
        /* import the config for the database */
        require_once("config.php");

        /* establish the connection to the database */
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
            or die("there was an error connecting to the database.");

        /* define the query */
        $query = "SELECT * FROM bookings INNER JOIN clients ON clients.clientID = bookings.clientID ORDER BY `bookingID` DESC";

        /* get the results of the query and put them into a variable */
        $result = mysqli_query($conn, $query)
            or die("There was an error executing the query.");

        /* close the connection */
        mysqli_close($conn);
        ?>

    </div>
    <br>
    <h1>Booking Requests</h1>


    <fieldset style="margin: auto; width: 30%;">


        <?php
        echo "<table>
        <tr>
            <td></td>
        </tr>";

        while ($row = mysqli_fetch_array($result)) {
            if ($row['status'] == "Pending") {


                echo "<tr>";
                echo "<td>" . "Booking ID: " . "<a href=\"adminclients.php?id=" . $row['bookingID'] . "\">" .
                    $row['bookingID'] .  "<br>" . $row['firstName'] . " " . $row['lastName'] . "<br>" .
                    "Departure Date: " . $row['startDate'] . "<br>" .
                    "From: " . $row['initialCollectionPoint'] . " -> " .  $row['finalCollectionPoint'] .
                    "</a>" . "</td>";
            }
        }
        echo "</table>";
        ?>
    </fieldset>



    <?php
    //add database credentials 
    require_once("config.php");
    //checking if the searching form has been submitted 
    if (isset($_REQUEST['submit'])) {
        //get the value from the form
        $search = $_REQUEST['txtSearch'];
        //make the connection to database
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
            or die("Could not connect to the database!");
        //issue out the query instructions
        $query = "SELECT * FROM bookings WHERE bookingID LIKE '%$search%'
        ORDER BY bookingID ASC";
        $results = mysqli_query($conn, $query)
            or die("Could not retrieve the data!");
        //extract the data 
        echo "<ol>";
        while ($row = mysqli_fetch_array($results)) {
            echo "<li>";
            echo $row['bookingID'];
            echo "</li>";
        }
        echo "</ol>";
        //close the connection to the database
        mysqli_close($conn);
    }
    ?>

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