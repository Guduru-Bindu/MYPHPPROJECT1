<?php
include('config.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background: linear-gradient(to right, #c2e9fb, #a1c4fd);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 50px;
            border-radius: 16px;
            width: 400px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #00c6ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }
        a:hover {
            background: #0072ff;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Welcome to the Dashboard</h2>
    <a href="create.php">Create Post</a>
    <a href="view.php">View Posts</a>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>