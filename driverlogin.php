<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <img src="images/logoo.png" alt="login picture" width="160px">
        <form method="POST" action="driverlogin.php">
            <input type="text" placeholder="Username" name="username" required>
            <p><input type="password" placeholder="Password" name="password" required></p>
            <p><input type="checkbox" name="check"><label for="checkbox">Remember me</label></p>
            <input type="submit" name="submit" value="Login"><br>
        </form> 
        <form method ="post" action  = "newdriver.php"><br>
            <a href="newClient.php"><input type="button" name="submit" value="Register"></a><br>
        </form><br>
        <form action="forgotpassword.php" method="post">
            <a href="forgotpassword.php">Forgot password</a>
        </form>

       
        <p>
         <?php   
            if(isset($_REQUEST['submit'])){
                require_once("config.php");
                $password = $_REQUEST['password'];
                $user = $_REQUEST['username'];
                    //connection to the database 
                $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                or die("could not connect");
                    //issue query instruction 
                $query = "SELECT passwords FROM driver WHERE contactNumber = $user";
                $results = mysqli_query($conn, $query)
                    or die("<strong style=\"color:red;\">Invalid username</strong>");
                $row = mysqli_fetch_array($results);
                $pass = $row['passwords'];
                if($pass == $password){
                    header("Location:driverhome.php");
                }
                else{
                    echo "<strong style=\"color:red;\">Wrong password!</strong>";
                }
                mysqli_close($conn);
            }
        ?>
        </p>
    </div>
</body>

</html>