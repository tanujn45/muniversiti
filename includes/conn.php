<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "muniversiti";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    echo "Error connecting to the database";
}
