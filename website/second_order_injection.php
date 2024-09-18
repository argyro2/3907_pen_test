<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sec_or";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    // Basic SQL query to authenticate user
    $sql = "SELECT * FROM users WHERE username = '$login_username' AND password = '$login_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $login_username; // Set session variable
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page after login
        exit();
    } else {
        echo "<p class='message error'>Invalid username or password.</p>";
    }
}
// Handle logout
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['logout'])) {
    session_destroy(); // Destroy the session
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the login page
    exit();
}

// Handle form submission for email update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_email'])) {
    if (isset($_SESSION['username'])) {
        $new_email = $_POST['email'];
        $username = $_SESSION['username']; // Use the logged-in user's username

        // Vulnerable SQL query (use carefully for testing)
        $sql = "UPDATE users SET email = '$new_email' WHERE username = '$username'";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='message success'>Email updated for $username.</p>";
        } else {
            echo "<p class='message error'>Error updating email: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='message error'>You must be logged in to update your email.</p>";
    }
}

// Handle form submission for email retrieval
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    $username = $_GET['username'];

    // Only perform the query if username is not empty
    if (!empty($username)) {
        $sql = "SELECT email FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p class='message success'>Email for " . htmlspecialchars($username) . ": " . htmlspecialchars($row["email"]) . "</p>";
            }
        } else {
            echo "<p class='message error'>No user found with username: " . htmlspecialchars($username) . "</p>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .message {

            font-weight: bold;
            text-align: center;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="text"], input[type="password"] {
            padding: 8px;
            font-size: 16px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .logout {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Email Update</h2>

    <?php if (!isset($_SESSION['username'])): ?>
        <!-- Login Form -->
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    <?php else: ?>
        <!-- Email Update Form -->
        <form method="POST">
            <label for="email">Enter New Email:</label>
            <input type="text" id="email" name="email" required><br>
            <input type="submit" name="update_email" value="Update Email">
        </form>

        <!-- Email Retrieval Form -->
        <form method="GET">
            <label for="username">Enter Username to Retrieve Email:</label>
            <input type="text" id="username" name="username"><br>
            <input type="submit" value="Retrieve Email">
        </form>

        <!-- Logout Button -->
        <form method="GET">
            <input type="submit" name="logout" value="Logout" class="logout">
        </form>
    <?php endif; ?>
</div>

</body>
</html>