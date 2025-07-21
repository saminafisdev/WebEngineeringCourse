<?php
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = "Form submitted successfully!<br>Your name: $username<br>Your email: $email";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Submission Example</title>
</head>
<body>
    <h2>Simple PHP Form</h2>
    <form method="post" action="">
        <label for="username">Name:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
    
    <div>
        <?php
        if ($message) {
            echo $message;
        }
        ?>
    </div>
</body>
</html>