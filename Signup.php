<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup - WanderNest</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: whitesmoke;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signup-container {
            background: #FBEAEB;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            color: #970747;
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #970747;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #d1457e;
        }
        .back-button {
            background-color: #970747; /* Different color for the back button */
            color: white;
            margin-top: 10px;
        }
        .back-button:hover {
            background-color: #d1457e; /* Darker shade on hover */
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "wandernestdb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert new user
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='text-align:center;'><h2>Signup successful!</h2><p>You can now log in.</p></div>";
    } else {
        echo "<div style='text-align:center;'><h2>Error:</h2><p>" . $conn->error . "</p></div>";
    }

    $conn->close();
} else {
?>

    <div class="signup-container">
        <h2>Signup</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Signup</button>
        </form>
        <form action="Home.html" method="get">
            <button type="submit" class="back-button">Back to Home</button>
        </form>
    </div>

<?php
}
?>

</body>
</html>
