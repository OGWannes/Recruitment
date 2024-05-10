<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "recruitment";

session_start();

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
