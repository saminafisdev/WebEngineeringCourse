<?php
include "db.php";
include "flash.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM booklist WHERE id=$id");
$book = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Book</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>

<body class="section">

  <div class="container">
    <h1 class="title has-text-centered">Edit Book</h1>

    <?php showFlash(); ?> <!-- ✅ Show notifications here -->

    <form action="update.php" method="POST" class="box">
      <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" name="title" value="<?php echo $book['title']; ?>" required>
        </div>
      </div>

      <div class="field">
        <label class="label">Author</label>
        <div class="control">
          <input class="input" type="text" name="author" value="<?php echo $book['author']; ?>" required>
        </div>
      </div>

      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <textarea class="textarea" name="description"><?php echo $book['description']; ?></textarea>
        </div>
      </div>

      <div class="field">
        <label class="label">Genre</label>
        <div class="control select">
          <select name="genre">
            <option <?php if ($book['genre'] == "Fiction") echo "selected"; ?>>Fiction</option>
            <option <?php if ($book['genre'] == "Non-fiction") echo "selected"; ?>>Non-fiction</option>
            <option <?php if ($book['genre'] == "Sci-fi") echo "selected"; ?>>Sci-fi</option>
            <option <?php if ($book['genre'] == "Romance") echo "selected"; ?>>Romance</option>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="checkbox">
          <input type="checkbox" name="best_selling" value="1" <?php if ($book['best_selling']) echo "checked"; ?>>
          Best Selling
        </label>
      </div>


      <div class="field has-text-centered">
        <button class="button is-primary">Update Book</button>
      </div>
    </form>
  </div>

</body>

</html>