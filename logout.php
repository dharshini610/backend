<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #dcedc1, #a3b18a); /* light green to olive brown */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .logout-container {
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
        text-align: center;
        width: 350px;
    }
    h2 {
        color: #6b705c; /* deep olive */
    }
    p {
        color: #8d9186;
        margin: 10px 0 20px;
    }
    a {
        display: inline-block;
        padding: 10px 20px;
        background: linear-gradient(90deg, #a3b18a, #6b705c); /* olive gradient */
        color: white;
        border-radius: 6px;
        text-decoration: none;
        transition: 0.3s;
    }
    a:hover {
        transform: scale(1.02);
        opacity: 0.9;
    }
</style>
<meta http-equiv="refresh" content="2;url=login.php">
</head>
<body>

<div class="logout-container">
    <h2>✅ Logged Out</h2>
    <p>You have been successfully logged out.</p>
    <a href="login.php">Go to Login</a>
</div>

</body>
</html>
