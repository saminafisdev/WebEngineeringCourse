<?php
include "db.php";
include "flash.php";

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$genre = $_POST['genre'];
$best_selling = isset($_POST['best_selling']) ? 1 : 0;

// ✅ Use prepared statement
$stmt = $conn->prepare("UPDATE booklist 
                        SET title=?, author=?, description=?, genre=?, best_selling=? 
                        WHERE id=?");
$stmt->bind_param("ssssii", $title, $author, $description, $genre, $best_selling, $id);

if ($stmt->execute()) {
  setFlash('success', '✏️ Book updated successfully!');
  header("Location: view.php");
  exit();
} else {
  setFlash('error', '❌ Error updating book: ' . $stmt->error);
  header("Location: edit.php?id=$id");
  exit();
}

$stmt->close();
