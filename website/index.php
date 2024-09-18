<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        .container {
            margin: 50px auto;
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
   </style>
</head>
<body>
    <h1>SQL Injection Demo</h1>
    <div class="container">
        <button onclick="window.location.href='sql_injection_login.php'">SQL Injection Based on User Input</button>
        <button onclick="window.location.href='blind_sql_injection.php'">Blind SQL Injection</button>
        <button onclick="window.location.href='error_based_injection.php'">Error-Based Injection</button>
        <button onclick="window.location.href='union_based_injection.php'">Union-based SQL Injection</button>
        <button onclick="window.location.href='second_order_injection.php'">Second-Order SQL Injection</button>
        <button onclick="window.location.href='http_header_injection.php'">SQL Injection Based on HTTP Headers</button>
        <button onclick="window.location.href='cookie_based_injection.php'">SQL Injection via Cookies</button>
    </div>
</body>
</html>
