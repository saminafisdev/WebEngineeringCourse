<?php
session_start(); // start session for flash messages

$servername = "localhost";
$username = "root"; // change if needed
$password = "admin123456"; // change if needed
$dbname = "CRUD";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
