<?php
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (!empty($email) && !empty($password)) {
        $result = $conn->query("SELECT user_id, name, password FROM Users WHERE email = '$email'");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION["user_id"] = $row['user_id'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No user found with that email.";
        }
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Online Bookstore</title>
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
        .login-container {
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
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #2c3e50;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        input[type="email"]:focus, input[type="password"]:focus {
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
        .register-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1em;
        }
        .register-link a {
            color: #34495e;
            text-decoration: none;
            font-weight: bold;
        }
        .register-link a:hover {
            color: #1abc9c;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
