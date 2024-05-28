<?php
$sarvername = "localhost";
$username = "root";
$password = "";
$dbname = "elestock";

$conn = new mysqli($sarvername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
?>