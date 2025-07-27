<?php
require 'db.php';

// Fetch books from the database
$stmt = $pdo->query("SELECT b.id, b.title, b.content, a.name AS author_name FROM book b JOIN author a ON b.author_id = a.id");
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Books</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS -->
</head>
<body>
    <h1>List of Books</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($books) > 0): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= htmlspecialchars($book['id']) ?></td>
                        <td><?= htmlspecialchars($book['title']) ?></td>
                        <td><?= htmlspecialchars($book['content']) ?></td>
                        <td><?= htmlspecialchars($book['author_name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No books found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <button onclick="window.location.href='create_book.php'">Create a New Book</button>
</body>
</html>
