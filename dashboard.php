<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h1>Hi, <b><?php echo ($_SESSION["email"]); ?></b>. Welcome to our site.</h1>
<a href="logout.php" class="btn btn-danger">Logout</a>
<p>
</body>

</html>
