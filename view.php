<?php
include('config.php');

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$query = "SELECT posts.*, users.username 
          FROM posts 
          JOIN users ON posts.user_id = users.id 
          WHERE posts.title LIKE '%$search%' OR posts.content LIKE '%$search%' 
          ORDER BY posts.created_at DESC 
          LIMIT $start, $limit";

$posts = $conn->query($query);

$countQuery = "SELECT COUNT(*) AS total FROM posts 
               WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
$countResult = $conn->query($countQuery);
$totalPosts = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalPosts / $limit);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
            transition: background 0.3s, color 0.3s;
        }

        .light-mode {
            background: #f0f2f5;
            color: #222;
        }

        .dark-mode {
            background: #1e1e2f;
            color: #f0f0f0;
        }

        .post {
            background: #fff;
            color: #000;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: background 0.3s, color 0.3s;
        }

        .dark-mode .post {
            background: #2c2c3c;
            color: #ddd;
        }

        .post h3 {
            margin: 0;
        }

        .post small {
            color: #777;
        }

        .dark-mode .post small {
            color: #bbb;
        }

        .actions a {
            margin-right: 10px;
            color: #007BFF;
            text-decoration: none;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 250px;
        }

        .search-form input[type="submit"] {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            background-color: #007BFF;
            color: white;
            margin-left: 10px;
            cursor: pointer;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            border: 1px solid #ccc;
            color: #007BFF;
            background: #fff;
        }

        .dark-mode .pagination a {
            background: #333;
            color: #fff;
            border-color: #555;
        }

        .pagination a.active {
            background-color: #007BFF;
            color: white;
        }

        .theme-buttons {
            margin-bottom: 20px;
        }

        .theme-buttons button {
            padding: 8px 12px;
            margin-right: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .no-results {
            text-align: center;
            margin-top: 50px;
        }

        .no-results img {
            width: 150px;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <div class="theme-buttons">
        <button onclick="setTheme('light')">Light Theme</button>
        <button onclick="setTheme('dark')">Dark Theme</button>
    </div>

    <h2>All Blog Posts</h2>

    <form method="GET" action="view.php" class="search-form">
        <input type="text" name="search" placeholder="Search posts..." value="<?= htmlspecialchars($search) ?>">
        <input type="submit" value="Search">
    </form>

    <?php if ($posts->num_rows > 0): ?>
        <?php while ($row = $posts->fetch_assoc()): ?>
            <div class="post">
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                <small>Posted by <?= htmlspecialchars($row['username']) ?> on <?= $row['created_at'] ?></small>
                <div class="actions">
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="no-results">
            <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="No Results">
            <p>No posts found for your search.</p>
        </div>
    <?php endif; ?>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="view.php?search=<?= urlencode($search) ?>&page=<?= $page - 1 ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="view.php?search=<?= urlencode($search) ?>&page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="view.php?search=<?= urlencode($search) ?>&page=<?= $page + 1 ?>">Next</a>
        <?php endif; ?>
    </div>

    <script>
        function setTheme(theme) {
            localStorage.setItem("theme", theme);
            applyTheme();
        }

        function applyTheme() {
            const theme = localStorage.getItem("theme") || "light";
            document.body.classList.remove("light-mode", "dark-mode");
            document.body.classList.add(theme + "-mode");
        }

        applyTheme(); // Initialize on load
    </script>
</body>
</html>
