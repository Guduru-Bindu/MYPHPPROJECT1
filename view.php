<?php
include('config.php');
$posts = $conn->query("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
    <style>
        body {
            background: linear-gradient(to right, #e0c3fc, #8ec5fc);
            font-family: 'Poppins', sans-serif;
            padding: 40px;
        }
        .post {
            background: white;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .post h3 {
            margin: 0;
        }
        .post small {
            color: #777;
        }
        .actions a {
            margin-right: 10px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
<h2>All Blog Posts</h2>
<?php while ($row = $posts->fetch_assoc()): ?>
    <div class="post">
        <h3><?= $row['title'] ?></h3>
        <p><?= nl2br($row['content']) ?></p>
        <small>Posted by <?= $row['username'] ?> on <?= $row['created_at'] ?></small>
        <div class="actions">
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </div>
    </div>
<?php endwhile; ?>
</body>
</html>
