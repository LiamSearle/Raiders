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
    <fieldset>
   <table>
       <tr>
           <td>Client ID</td>
           <td><input type="text" name="client_fname"></td>
       </tr>
       <tr>
           <td>Driver</td>
           <td><select name="driver" id="driver" style="width:173px;">
               <option> A</option>
               <option> B</option>
               <option> C</option>
               <option> D</option>
           </select></td>
       </tr>
       <tr>
           <td>Vehicles</td>
           <td><select name="vehicles" id="vehicles" style="width:173px;">
               <option> A</option>
               <option> B</option>
               <option> C</option>
               <option> D</option>
           </select></td>
       </tr>
   </table>
</fieldset>
</body>
</html>