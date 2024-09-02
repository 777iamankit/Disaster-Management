<?php

/*
include("navbar.php");

?><?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    // Prepare and execute SQL query
    $stmt = $conn->prepare("SELECT Username, Password, UserType FROM User WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    // Check if username exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbUsername, $dbPassword, $userType);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $dbPassword)) {
            // Set session variables
            $_SESSION['username'] = $dbUsername;
            $_SESSION['usertype'] = $userType;

            // Redirect based on user type
            if ($userType == 'Rehabilitation Institutes') {
                header("Location: ./recovery/rehab_home.php");
            } elseif ($userType == 'General User') {
                header("Location: ./user/user_home.php");
            } else {
                echo "Unknown user type.";
            }
            exit();
        } else {
            $login_error = "Invalid username or password.";
        }
    } else {
        $login_error = "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
    */
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            justify-content: flex-start;
        }

        h1 {
            color: #333;
            margin-top: 20px; /* Adjust this value to move the header further up or down */
            margin-bottom: 10px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-top: 10px; /* Adjust this value to control the distance between the header and the form */
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            color: #d9534f;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Login</h1>

    <?php
    // Display error message
    if (isset($login_error)) {
        echo "<p>$login_error</p>";
    }
    ?>

    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>

</html>
