<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "booktour";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if ($conn) {
  mysqli_query($conn, "SET NAMES 'utf8'");
}
else {
  die("Connection failed: " . mysqli_connect_error());
}
