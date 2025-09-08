<?php
session_start();
include "db.php";
<<<<<<< HEAD
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Unauthorized");
}

$id = $_GET['id'] ?? null;
// Handle confirmation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
    $stmt->execute([$id]);
if (!$id) { header("Location: index.php"); exit(); }

$stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
exit();
}
?>
=======

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

// If user confirms deletion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['confirm'])) {
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
>>>>>>> f73cb1be9298f1cfcf108d3b0841a47953db23cb
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirm Delete</title>
<style>
    body {
        font-family: Arial, sans-serif;
<<<<<<< HEAD
        background: linear-gradient(135deg, #dcedc1, #a3b18a); /* light green → olive brown */
=======
        background: #f4f6f8;
>>>>>>> f73cb1be9298f1cfcf108d3b0841a47953db23cb
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .confirm-box {
<<<<<<< HEAD
        background: #f7f9f2; /* light cream container */
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
=======
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 6px 18px rgba(0,0,0,0.1);
>>>>>>> f73cb1be9298f1cfcf108d3b0841a47953db23cb
        max-width: 400px;
        text-align: center;
    }
    .confirm-box h2 {
<<<<<<< HEAD
        color: #6b705c; /* deep olive */
=======
        color: #ff2f92;
>>>>>>> f73cb1be9298f1cfcf108d3b0841a47953db23cb
        margin-bottom: 10px;
    }
    .confirm-box p {
        color: #555;
        margin-bottom: 20px;
    }
    .btn {
        padding: 10px 18px;
        font-size: 1rem;
<<<<<<< HEAD
        border-radius: 6px;
        border: none;
        cursor: pointer;
        margin: 5px;
        transition: 0.3s;
    }
    .btn-delete {
        background: linear-gradient(90deg, #a3b18a, #6b705c); /* olive gradient */
        color: white;
        box-shadow: 0px 4px 10px rgba(107,112,92,0.3);
    }
    .btn-delete:hover {
        transform: scale(1.02);
        opacity: 0.92;
    }
    .btn-cancel {
        background: #b7b7a4; /* soft olive-gray */
        color: #333;
    }
    .btn-cancel:hover {
        background: #a3a388;
=======
        border-radius: 5px;
        border: none;
        cursor: pointer;
        margin: 5px;
    }
    .btn-delete {
        background: linear-gradient(90deg, #ff7e5f, #ff2f92);
        color: white;
        box-shadow: 0px 4px 10px rgba(255, 47, 146, 0.3);
    }
    .btn-delete:hover {
        opacity: 0.92;
    }
    .btn-cancel {
        background: #ccc;
        color: #333;
    }
    .btn-cancel:hover {
        background: #bbb;
>>>>>>> f73cb1be9298f1cfcf108d3b0841a47953db23cb
    }
</style>
</head>
<body>

<div class="confirm-box">
    <h2>⚠ Confirm Deletion</h2>
    <p>Are you sure you want to delete this post? This action cannot be undone.</p>
    <form method="post">
        <button type="submit" name="confirm" class="btn btn-delete">Yes, Delete</button>
        <a href="index.php" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> f73cb1be9298f1cfcf108d3b0841a47953db23cb
