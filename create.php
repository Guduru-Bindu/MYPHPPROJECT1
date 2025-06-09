<?php
include('config.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Handle file upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    if (!file_exists('uploads')) {
        mkdir('uploads');
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO posts (title, content, image, user_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $title, $content, $image, $user_id);
        if ($stmt->execute()) {
            header("Location: view.php");
            exit();
        } else {
            $error = "Post creation failed!";
        }
    } else {
        $error = "Image upload failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <style>
        body {
            background: linear-gradient(to right, #fddb92, #d1fdff);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 14px;
            width: 420px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            background: #00b09b;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        .error {
            color: red;
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    <h2>Create New Post</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Write your content..." rows="5" required></textarea>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Post</button>
</form>
</body>
</html>
