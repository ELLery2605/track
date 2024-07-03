<?php
// Assuming this PHP script handles the form submission

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $county = $_POST['county'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $age = $_POST['age'] ?? '';
    $department = $_POST['department'] ?? '';
    $date = $_POST['date'] ?? '';

    // You can process or validate the data here as needed
    // For simplicity, let's just print the data for demonstration purposes
    echo "County: " . htmlspecialchars($county) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Username: " . htmlspecialchars($username) . "<br>";
    // Note: Never echo or output passwords in a real application for security reasons
    echo "Password: " . htmlspecialchars($password) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Age: " . htmlspecialchars($age) . "<br>";
    echo "Department: " . htmlspecialchars($department) . "<br>";
    echo "Date: " . htmlspecialchars($date) . "<br>";

    // Optionally, you can save this data to a database or perform other operations
    // Here's a basic example of connecting to a MySQL database
    // Replace with your actual database credentials and setup
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "bitscentre";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Example SQL to insert data into a table named 'users'
    $sql = "INSERT INTO bitscare (county, email, username, password, gender, age, department, date)
            VALUES ('$county', '$email', '$username', '$password', '$gender', '$age', '$department', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
