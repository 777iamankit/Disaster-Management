<?php
/*

include("config.php");


$username= $email =$password =$contact =$usertype =$address ="";
$registration_result=" ";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $username=$_POST['username'];
    $email= $_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $usertype=$_POST['usertype'];
    $address=$_POST['address'];

    $username = htmlspecialchars($username);
    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($password);
    $contact = htmlspecialchars($contact);
    $usertype=htmlspecialchars($usertype);
    $address = htmlspecialchars($address);

    $sql = "INSERT INTO User(Username,Email,Password,ContactInfo,UserType,Address)
            VALUES('$username','$email','$password','$contact','$usertype','$address')";

    if ($conn->query($sql) === TRUE) {
        $registration_result="Registration successfull";
    }
    else {
        $registration_result= "Error" . $sql . "<br>" . $conn->error;
    }
     
   
   $conn->close();
}
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
        }

        h1 {
            text-align: left;
            color: #333;
            margin-right: 20px;
            /* Additional margin on the right to create space between the header and the form */
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        p {
            color: #d9534f;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Registration</h1>

        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="contact_info">Contact Info:</label>
            <input type="text" id="contact_info" name="contact_info">

            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value="Rehabilitation Institutes">Rehabilitation Institutes</option>
                <option value="General User">General User</option>
            </select>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4"></textarea>

            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>

