<?php
include_once 'db.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch user data
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $new_email = $_POST['email'];
    $password = $_POST['password'];

    if ($name == '' || $new_email == '' || $password == '') {
        echo "<script>alert('All fields are required!');</script>";
    } else {
        // Update user information
        $update_sql = "UPDATE users SET name = '$name', email = '$new_email', password = '$password' WHERE email = '$email'";
        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['email'] = $new_email;
            echo "<script>alert('Profile updated successfully!'); window.location='dashboard.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error updating profile!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4A90E2;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            width: 300px;
            padding: 20px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        .btn:hover {
            background-color: #4cae4c;
        }
        .btn-cancel {
            background-color: red;
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
            margin-top: 10px;
            border-radius: 5px;
        }
        .btn-cancel:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Profile</h2>
    <form method="post">
        <input type="text" name="name" value="<?= $user['name'] ?>" placeholder="Name" required>
        <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email" required>
        <input type="password" name="password" placeholder="New Password" required>
        <input type="submit" name="update" class="btn" value="Update">
    </form>
    <a href="dashboard.php" class="btn-cancel">Cancel</a>
</div>

</body>
</html>
