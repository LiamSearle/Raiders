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
        <form method="POST" action="raiders.php">
            <input type="text" placeholder="Username" name="username">
            <p><input type="password" placeholder="Password" name="password"></p>
            <p><input type="checkbox" name="check"><label for="checkbox">Remember me</label></p>
            <input type="submit" name="submit" value="Login"><br>
            <a href="#">Forgot password</a>
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
                $query = "SELECT passwords FROM client WHERE contactNumber = $user";
                $results = mysqli_query($conn, $query)
                or die("Invalid password or username");
                $row = mysqli_fetch_array($results);
                $pass = $row['passwords'];
                if($pass == $password){
                    header("Location:bookingreq.php");
                }
                else{
                    echo "<strong style=\"color:red;\">password wrong!</strong>";
                }
                mysqli_close($conn);
            }
        ?>
        </p>
    </div>
</body>

</html>