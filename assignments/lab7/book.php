<?php include "db.php";
include "flash.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Add Book</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>

<body class="section">

  <div class="container">
    <h1 class="title has-text-centered">Add a New Book</h1>

    <?php showFlash(); ?> <!-- ✅ Show notifications here -->

    <form action="insert.php" method="POST" class="box">
      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" name="title" required>
        </div>
      </div>

      <div class="field">
        <label class="label">Author</label>
        <div class="control">
          <input class="input" type="text" name="author" required>
        </div>
      </div>

      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <textarea class="textarea" name="description"></textarea>
        </div>
      </div>

      <div class="field">
        <label class="label">Genre</label>
        <div class="control">
          <div class="select">
            <select name="genre">
              <option value="Fiction">Fiction</option>
              <option value="Non-fiction">Non-fiction</option>
              <option value="Sci-fi">Sci-fi</option>
              <option value="Romance">Romance</option>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="checkbox">
          <input type="checkbox" name="best_selling" value="1">
          Best Selling
        </label>
      </div>

      <div class="field has-text-centered">
        <button class="button is-primary">Add Book</button>
      </div>
    </form>
  </div>

</body>

</html>