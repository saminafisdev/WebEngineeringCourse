<?php
include "db.php";
include "flash.php";

$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$genre = $_POST['genre'];
$best_selling = isset($_POST['best_selling']) ? 1 : 0;

// ✅ Use prepared statement
$stmt = $conn->prepare("INSERT INTO booklist (title, author, description, genre, best_selling) 
                        VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $title, $author, $description, $genre, $best_selling);

if ($stmt->execute()) {
  setFlash('success', '📚 Book added successfully!');
  header("Location: view.php");
  exit();
} else {
  setFlash('error', '❌ Error adding book: ' . $stmt->error);
  header("Location: book.php");
  exit();
}

$stmt->close();
