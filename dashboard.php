<?php
include_once("connection.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$result = $conn->query("SELECT name FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bookstore Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            height: 100vh;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            flex-shrink: 0;
            width: 100%;
        }
        h1 {
            margin: 0;
        }
        .welcome-message {
            font-size: 1.5em;
            margin-top: 10px;
        }
        nav {
            background-color: #34495e;
            padding: 20px;
            text-align: left;
            width: 250px;
            flex-shrink: 0;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            margin: 10px 0;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color: #1abc9c;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .content h3 {
            color: #2c3e50;
            font-size: 1.8em;
        }
        .content p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #7f8c8d;
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Online Bookstore Management System</h1>
        <p class="welcome-message">Welcome, <?php echo $user['name']; ?>!</p>
    </header>

    <nav>
        <a href="library.php">Library</a>
        <a href="changepassword.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="main-content">
        <div class="content">
            <h3>Welcome Panel</h3>
            <p>This is a standard dashboard for our website project. You can manage your projects, view the library, and change your password. Enjoy managing your online bookstore with ease!</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Online Bookstore Management System. All rights reserved.</p>
    </div>
</body>
</html>
