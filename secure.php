<?php
// username and password for authentication
$username = "admin";
$password = "admin";
// check if any authentication details have been sent or if username and password are correct
if (
    !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
    || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)
) {
    // username and password incorrect so send authentication headers
    header("HTTP/1.1 401 Unauthorized");
    header("WWW-Authenticate: Basic realm='restricted area'");
    exit("Sorry, this area is for CFO access only!");
}
?>