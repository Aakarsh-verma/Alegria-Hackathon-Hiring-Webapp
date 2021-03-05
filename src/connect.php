<?php
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "jobtracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

echo "<script> console.log('Connecting to DB...') </script>";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    echo "<script> console.log('Connected Successfully') </script>";
}

?>