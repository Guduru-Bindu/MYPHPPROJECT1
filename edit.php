<?php include('config.php');
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    header("Location: index.php");
}

$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <style>
        <?php include('style-embed.css'); ?>
    </style>
</head>
<body>
<h2>Edit Post</h2>
<form method="post">
    <label>Title:</label><input name="title" value="<?= $post['title'] ?>"><br>
    <label>Content:</label><br><textarea name="content"><?= $post['content'] ?></textarea><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
