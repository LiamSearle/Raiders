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
<nav>
       <table>
            <tr>
                <td><img src="images/logoo.png" height="40px"></td>
                <td><a href="bookingreq.php">Home</a></td>
                <td><a href="clients.php">Clients</a></td>
                <td><a href="booking.php">Bookings</a></td>
            </tr>
        </table>
    </nav>
    <br>
    <form action="client.php" method="post"> <fieldset>
    <label for="clientid">Client ID</label>
    <input type="text" placeholder="Client ID"></fieldset>
    
       
    <fieldset><p>Client Information
   <table>
       <tr>
           <td>First Name</td>
           <td><input type="text" name="client_fname"></td>
       </tr>
       <tr>
           <td>Last Name</td>
           <td><input type="text" name="client_lname"></td>
       </tr>
       <tr>
           <td>E-mail</td>
           <td><input type="text" name="client_email"></td>
       </tr>
       <tr>
           <td>Contact Number</td>
           <td><input type="text" name="client_number"></td>
       </tr>
   </table>
</p></fieldset>
    </form>
       
    
</body>
</html>