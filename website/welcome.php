<?php
// Database connection parameters
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "db_cookies_inj";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user_id from the cookie
$user_id = $_COOKIE['user_id'];

// Vulnerable SQL query that fetches the user information based on the user_id >
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Welcome back, " . $row["username"] . "!</p>";
    }
} else {
    echo "<p>User not found.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;

           background-color: #f4f4f4;
            margin: 20px;
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
        p {
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome</h2>
        <!-- User information will be displayed here -->
    </div>
</body>
</html>