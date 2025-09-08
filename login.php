<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Blog App</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #a3b18a, #6b705c); /* light green to olive-brown */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .login-container {
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
        width: 350px;
        text-align: center;
    }
    h2 {
        margin-bottom: 20px;
        color: #6b705c; /* deep olive */
    }
    input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #b7b7a4;
        border-radius: 6px;
        font-size: 1rem;
    }
    button {
        width: 100%;
        padding: 10px;
        background: linear-gradient(90deg, #a3b18a, #6b705c); /* olive gradient */
        border: none;
        color: white;
        font-size: 1rem;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
        transition: 0.3s;
    }
    button:hover {
        transform: scale(1.02);
        opacity: 0.9;
    }
    a {
        display: block;
        margin-top: 15px;
        text-decoration: none;
        color: #6b705c;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="login-container">
    <form method="post">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <a href="register.php">Don't have an account? Register</a>
</div>

</body>
</html>
