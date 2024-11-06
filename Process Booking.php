<?php
// Database connection settings
$servername = "localhost"; // Update with your database server
$username = "root";        // Update with your database username
$password = "";            // Update with your database password
$dbname = "wandernestdb";    // Update with your database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$checkin = $conn->real_escape_string($_POST['checkin']);
$checkout = $conn->real_escape_string($_POST['checkout']);
$property = $conn->real_escape_string($_POST['property']);

// Insert data into bookings table
$sql = "INSERT INTO bookings (name, email, phone, checkin_date, checkout_date, property)
        VALUES ('$name', '$email', '$phone', '$checkin', '$checkout', '$property')";

if ($conn->query($sql) === TRUE) {
    echo "<p>Booking confirmed successfully!</p>";
    echo "<a href='Home.html'>Return to Homepage</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
