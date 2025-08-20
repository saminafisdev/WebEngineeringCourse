<?php include "db.php";
include "flash.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <title>View Books</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>

<body class="section">

  <div class="container">
    <h1 class="title has-text-centered">Book List</h1>

    <?php showFlash(); ?> <!-- ✅ Show notifications here -->

    <div class="has-text-right mb-4">
      <a href="book.php" class="button is-link">➕ Add New Book</a>
    </div>

    <table class="table is-striped is-fullwidth">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Genre</th>
          <th>Best Selling</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM booklist");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['genre']}</td>
                    <td>" . ($row['best_selling'] ? "✅" : "❌") . "</td>
                    <td>{$row['description']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='button is-small is-warning'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='button is-small is-danger'
                           onclick=\"return confirm('Are you sure you want to delete this book?');\">Delete</a>
                    </td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>