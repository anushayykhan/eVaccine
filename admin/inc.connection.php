<?php
ob_start();
session_start();

include('inc.functions.php');

$hostname = "localhost";
$username = "root";
$password = "";
$database = "vaccination_system"; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
