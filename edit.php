<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

// Fetch post
$stmt = $conn->prepare("SELECT title, content FROM posts WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($title, $content);
$stmt->fetch();
$stmt->close();

// Update post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_title = trim($_POST['title']);
    $new_content = trim($_POST['content']);

    if ($new_title && $new_content) {
        $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
        $stmt->bind_param("ssi", $new_title, $new_content, $id);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }
}
?>
<h2>Edit Post</h2>
<form method="post">
    <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br><br>
    <textarea name="content" required><?php echo htmlspecialchars($content); ?></textarea><br><br>
    <button type="submit">Update Post</button>
</form>
<a href="index.php">Back</a>