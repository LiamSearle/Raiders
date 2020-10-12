<?php

require_once("config.php");
$message="Please rebook and enter your correct details" . " " . "- Hamba Kahle Transport ";
/* establish the connection to the database */
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
or die("there was an error connecting to the database.");

echo $_REQUEST['id'];
/* define the query */
$query = "DELETE FROM `bookings` WHERE bookings.bookingID=" . $_REQUEST['id'] . ";";

/* get the results of the query and put them into a variable */
$result = mysqli_query($conn, $query)
    or die("There was an error executing the query.");


/* close the connection */
mysqli_close($conn);
mail('<?php echo $email; ?>','Incorrect Booking Details','<?php echo $message; ?>');
header("Location:adminhomepage.php");
exit();

?>