<?php
$servername = "localhost";
$username = "root";
$password = "lucyfer96";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
$testConnect = "Connected successfully.";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $testConnect = "Connection failed";
} 

?>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL</h1>
 <p><?= $testConnect ?></p>
</body>
</html>