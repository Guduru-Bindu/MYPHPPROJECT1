<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: #fff;
            padding: 40px 60px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }
        a {
            display: block;
            margin: 15px 0;
            text-decoration: none;
            color: #4A00E0;
            font-weight: 600;
            font-size: 18px;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to the Blog</h1>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="dashboard.php">Dashboard</a>
</div>
</body>
</html>