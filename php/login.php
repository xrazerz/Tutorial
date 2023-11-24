<?php
session_start();

include("connact_database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass =$password=md5($password);

    // Validate and sanitize inputs here if needed

    $sql = "SELECT * FROM users WHERE gmail = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Verify the password
            if ($row["password"] ==$password ) {
                // Password is correct, start a new session
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['name'];

                // Redirect to a logged-in page
                header("Location: ../dashboard/dashboard.php");
                exit(); // Important: Always exit after a header redirect
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    } else {
        // Log or handle the error appropriately
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
