<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
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
            width: 100%;
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
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>

    <?php
    // Database connection parameters
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "db_ht";

    // Create a connection to the database
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Check if the user exists
        $stmt = $conn->prepare("SELECT * FROM login_attempts WHERE username = ?>
        $stmt->bind_param("ss", $username, $password);
       $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User exists
            echo "<p class='message success'>Login successful.</p>";
        } else {
            // User does not exist
            echo "<p class='message error'>Invalid credentials.</p>";
        }

        // Record the login attempt
        $stmt = $conn->prepare("INSERT INTO login_attempts (username, password,>
        $stmt->bind_param("sss", $username, $password, $user_agent);
        if ($stmt->execute()) {
            // Record successful
        } else {
            echo "<p class='message error'>Error recording login attempt: " . $>
        }
       $stmt->close();
    }

    $conn->close();
    ?>

</div>

</body>
</html>