<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search</title>
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
        label {           margin-bottom: 10px;
        }
        input[type="text"] {
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
    </style>
</head>
<body>

<div class="container">
    <h2>User Search</h2>
    <form method="POST">
        <label for="username">Enter Username:</label>
        <input type="text" id="username" name="username" required><br>
        <input type="submit" value="Search">
    </form>

    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";  
    $dbname = "db_blind";  

    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['username'];  // Directly use user input without escapi>

        // Vulnerable SQL query
        $sql = "SELECT * FROM users WHERE username = '$input'";
        $result = $conn->query($sql);

        // Display message based on the actual query result
        if ($result && $result->num_rows > 0) {
            echo "<p class='message success'>User found!</p>";
        } else {
            echo "<p class='message error'>No user found.</p>";
        }
 }

    $conn->close();
    ?>

</div>

</body>
</html>