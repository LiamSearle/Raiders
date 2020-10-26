<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver Log In</title>
    <link rel="icon" href="images/small_logo.png" type="image" sizes="100x100">
</head>

<body>
    <div class="topright">
        <a href="index.php"><img src="images/firstpage.png" style="width:42px;height:42px;"></a>
    </div>
    <div class="login">
        <img src="images/small_logo.png" alt="login picture" width="300px">
        <form method="POST" action="driverlogin.php">
            <input type="text" placeholder="Username" name="username" required>
            <p><input type="password" placeholder="Password" name="passwords" required></p>
            <p><input type="checkbox" name="check"><label for="checkbox">Remember me</label></p>
            <input type="submit" name="submit" value="Login"><br>
        </form><br>
        <form action="forgotpassword.php" method="post">
            <a href="forgotpassword.php">Forgot password</a>
        </form>


        <p>
            <?php
            if (isset($_REQUEST['submit'])) {
                require_once("config.php");
                $passwords = $_REQUEST['passwords'];
                $user = $_REQUEST['username'];
                //connection to the database 
                $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                    or die("could not connect");
                //issue query instruction 
                $query = "SELECT password FROM employees WHERE employeeID='$user'";
                $results = mysqli_query($conn, $query)
                    or die("<strong style=\"color:red;\">Invalid username</strong>");
                $row = mysqli_fetch_array($results);
                $pass = $row['password'];
                

                if ((substr($user, 0, 2) == "DR") && ($pass == $passwords)) {
                    header("Location:drivershomepage.php?id=$user");
                } 
                else {
                    echo "<strong style=\"color:red;\">Incorrect Login!</strong>";
                }
                mysqli_close($conn);
            }
            ?>
        </p>
    </div>
</body>

</html>