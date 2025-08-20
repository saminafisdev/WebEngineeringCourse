<?php
include "db.php";
include "flash.php";

$id = $_GET['id'];

if ($conn->query("DELETE FROM booklist WHERE id=$id")) {
  setFlash('success', '🗑️ Book deleted successfully!');
} else {
  setFlash('error', '❌ Error deleting book: ' . $conn->error);
}

header("Location: view.php");
exit();
