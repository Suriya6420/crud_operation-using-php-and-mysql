<?php
include_once 'db.php';

session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email =='' or $password =='' ) {
        echo "<script>alert('Fill the Required field!');</script>";    
    }
    else{   
        if ($email == 'admin@gmail.com' and $password=="admin123"){
            header("location: admin.php");
        } 
        else{
            $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
            $users = $conn->query($sql);
            $number_count = $users->num_rows; 
            if ($number_count > 0) {
                echo "<script>alert('User Login Successfully!');</script>";            
                $_SESSION['email'] = $email;            
                $_SESSION['user_info'] = $users;            
                header("location: dashboard.php");
            } else {
                echo "<script>alert('Invalid login credentials!');</script>";
            }
        }  
       
    }
    
}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
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
        /* input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        } */
        input, a{
            color:rgb(196, 199, 196);

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
    <h2>Login</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
         <a href="register.php"  class="btn btn-default">register</a>
        <input type="submit" class="btn btn-success"  name="login" value="login">
    </form>
    <a href="update.php" class="btn btn-warning">Update Account</a>
    <a href="delete.php" class="btn btn-danger">Delete Account</a>
</div>

</body>
</html>