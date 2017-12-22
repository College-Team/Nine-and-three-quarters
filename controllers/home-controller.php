<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "labfinal";

$conn = new mysqli($servername, $username, $password, $dbname);


$qury = "SELECT * FROM users WHERE";
$result = $conn->query($qury);

?>