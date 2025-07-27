<?php
require 'db.php';

// Fetch authors from the database
$stmt = $pdo->query("SELECT id, name FROM author");
$authors = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];

    $stmt = $pdo->prepare("INSERT INTO book (title, content, author_id) VALUES (:title, :content, :author_id)");
    $stmt->execute(['title' => $title, 'content' => $content, 'author_id' => $author_id]);

    header("Location: create_book.php"); // Redirect back to the book creation page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create Book</title>
</head>
<body>
    <h1>Create a New Book</h1>
    <form action="create_book.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea><br><br>

        <label for="author_id">Author:</label>
        <select id="author_id" name="author_id" required>
            <option value="">Select an author</option>
            <?php foreach ($authors as $author): ?>
                <option value="<?= $author['id'] ?>"><?= htmlspecialchars($author['name']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Create Book</button>
    </form>

    <h2>Create a New Author</h2>
    <form action="create_author.php" method="POST">
        <label for="author_name">Author Name:</label>
        <input type="text" id="author_name" name="author_name" required><br><br>
        <button type="submit">Create Author</button>
    </form>
</body>
</html>
