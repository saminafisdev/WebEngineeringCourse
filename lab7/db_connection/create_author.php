<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author_name = $_POST['author_name'];

    $stmt = $pdo->prepare("INSERT INTO author (name) VALUES (:name)");
    $stmt->execute(['name' => $author_name]);

    header("Location: create_book.php"); // Redirect back to the book creation page
    exit;
}
?>
