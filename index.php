<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle Create
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title && $content) {
        $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch all posts
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog - Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #dcedc1, #a3b18a); /* light green → olive brown */
        margin: 0;
        padding: 0;
    }
    header {
        background: #6b705c; /* deep olive */
        color: white;
        padding: 15px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    header h2 {
        margin: 0;
    }
    header a {
        color: white;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.2);
        padding: 8px 15px;
        border-radius: 6px;
        transition: 0.3s;
    }
    header a:hover {
        background: rgba(255, 255, 255, 0.4);
    }
    main {
        max-width: 900px;
        margin: 30px auto;
        background: #f7f9f2; /* light cream for content area */
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
    }
    h3 {
        margin-bottom: 15px;
        color: #6b705c; /* deep olive */
    }
    form input, form textarea, form button {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        border: 1px solid #b7b7a4;
        border-radius: 6px;
        font-size: 1rem;
    }
    form textarea {
        resize: none;
        height: 100px;
    }
    form button {
        background: linear-gradient(90deg, #a3b18a, #6b705c); /* olive gradient */
        color: white;
        border: none;
        cursor: pointer;
        font-weight: bold;
        margin-top: 12px;
        box-shadow: 0px 4px 10px rgba(107,112,92,0.3);
        transition: 0.3s;
    }
    form button:hover {
        transform: scale(1.02);
        opacity: 0.9;
    }
    .post {
        border: 1px solid #b7b7a4;
        padding: 15px;
        margin-top: 15px;
        border-radius: 8px;
        background: #f0f4e6; /* light greenish background */
    }
    .post h4 {
        margin: 0;
        color: #6b705c; /* deep olive */
    }
    .post p {
        margin: 8px 0;
        color: #555;
        line-height: 1.5;
    }
    .post small {
        color: #888;
    }
    .post a {
        color: #a3b18a; /* olive */
        text-decoration: none;
        margin-right: 10px;
        font-size: 0.9rem;
    }
    .post a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<header>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php">Logout</a>
</header>

<main>
    <h3>Create New Post</h3>
    <form method="post">
        <input type="text" name="title" placeholder="Post Title" required>
        <textarea name="content" placeholder="Post Content" required></textarea>
        <button type="submit">Add Post</button>
    </form>

    <h3>All Posts</h3>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="post">
            <h4><?php echo htmlspecialchars($row['title']); ?></h4>
            <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
            <small>Posted on <?php echo $row['created_at']; ?></small><br>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </div>
    <?php endwhile; ?>
</main>

</body>
</html>
