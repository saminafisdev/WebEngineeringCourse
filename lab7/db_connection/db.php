<?php
$host = 'localhost'; 
$db   = 'lab'; 
$user = 'root'; 
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; // Data Source Name
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Error handling
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch mode
    PDO::ATTR_EMULATE_PREPARES   => false, // Use real prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Create a PDO instance
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode()); // Handle connection error
}
?>
