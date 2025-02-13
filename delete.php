<?php
include_once 'db.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email'];

if (isset($_POST['delete'])) {
    $delete_sql = "DELETE FROM users WHERE email = '$email'";
    if ($conn->query($delete_sql) === TRUE) {
        session_destroy();
        echo "<script>alert('Account deleted successfully!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error deleting account!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d7da;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            width: 350px;
            padding: 20px;
            margin: auto;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        p {
            color: #721c24;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }
        .btn-danger {
            background-color: red;
            color: white;
        }
        .btn-danger:hover {
            background-color: darkred;
        }
        .btn-cancel {
            background: gray;
            color: white;
        }
        .btn-cancel:hover {
            background: black;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Delete Account</h2>
    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
    <form method="post">
        <input type="submit" class="btn btn-danger" name="delete" value="Delete Account">
    </form>
    <a href="dashboard.php" class="btn btn-cancel">Cancel</a>
</div>

</body>
</html>
