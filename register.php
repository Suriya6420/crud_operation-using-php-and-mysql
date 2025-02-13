<?php
include_once 'db.php';

if (isset($_POST['register'])) {
    // print_r($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($name =='' or $email =='' or $password =='' ) {
        echo "<script>alert('Fill the Required field!');</script>";    
    }
    else{
        $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        echo "<script>alert('User Register Successfully!');</script>";
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4A90E2;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            width: 400px;
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
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        table {
            width: 80%;
            margin: auto;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        .delete-btn {
            color: white;
            background-color: red;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login Registration</h2>
    <form method="post" action="">
        <input type="text" name="name" placeholder="User Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="register" value="Register">
        <a href="index.php" class="btn btn-default">login</a>
    </form>
</div>

</body>
</html>