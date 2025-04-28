<?php
include_once("connection.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_pass = password_hash(trim($_POST['new_password']), PASSWORD_DEFAULT);
    $user_id = $_SESSION["user_id"];

    $stmt = $conn->prepare("UPDATE Users SET password = ? WHERE user_id = ?");
    $stmt->bind_param("si", $new_pass, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Password changed successfully.');</script>";
    } else {
        echo "<p style='color:red;'>Failed to update password.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Change Password</title></head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Online Bookstore</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .change-password-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        label {
            display: block;
            margin-bottom: 4px; /* Reduced margin for closer spacing */
            font-size: 1.1em;
            color: #2c3e50;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        input[type="password"]:focus {
            border-color: #1abc9c;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #1abc9c;
            color: white;
            font-size: 1.1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #16a085;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1em;
        }
        .back-link a {
            color: #34495e;
            text-decoration: none;
            font-weight: bold;
        }
        .back-link a:hover {
            color: #1abc9c;
        }
    </style>
</head>
<body>
    <div class="change-password-container">
        <h2>Change Password</h2>

        <form method="POST">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            
            <button type="submit">Update Password</button>
        </form>

        <div class="back-link">
            <p><a href="dashboard.php">Back to Dashboard</a></p>
        </div>
    </div>
</body>
</html>

</html>