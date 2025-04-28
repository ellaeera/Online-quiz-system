<?php
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $phone = htmlspecialchars(trim($_POST['phone']));

    if (!empty($name) && !empty($email) && !empty($_POST['password'])) {
        $stmt = $conn->prepare("INSERT INTO Users (name, email, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $phone);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Please login.'); window.location.href='login.php';</script>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Please fill in all required fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Online Bookstore</title>
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
        .registration-container {
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
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #2c3e50;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
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
        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1em;
        }
        .login-link a {
            color: #34495e;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            color: #1abc9c;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>User Registration</h2>

        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="phone">Phone (Optional):</label>
            <input type="text" id="phone" name="phone">
            
            <button type="submit">Register</button>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Back to Login</a></p>
        </div>
    </div>
</body>
</html>

