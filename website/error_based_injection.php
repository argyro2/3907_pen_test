<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error-Based SQL Injection Test</title>
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
    <h2>Error-Based SQL Injection Test</h2>
    <form method="POST">
        <label for="id">Product ID:</label>
        <input type="text" id="id" name="id" required><br>
        <input type="submit" value="Search">
    </form>

    <?php
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_error";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        // Vulnerable SQL query
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   echo "Product: " . htmlspecialchars($row["name"]) . " - Price: " . htmlspecialchars($row["price"]) . "<br>";
                }
            } else {
                echo "<p class='message error'>No product found.</p>";
            }
        } else {
            // Display SQL error if the query fails
            echo "<p class='message error'>SQL Error: " . htmlspecialchars($conn->error) . "</p>";
        }
    }

    $conn->close();
    ?>

</div>

</body>
</html>