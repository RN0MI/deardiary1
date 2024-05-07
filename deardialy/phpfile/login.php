<?php

include('db_connection.php');
session_start();




// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $password = $_POST["password"];
 // Validate the form data (you can add more validation if needed)
 if (empty($username) || empty($password)) {
    $error = "Please enter both username and password";
} else {
    
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            // Check if the login was successful
            if (mysqli_num_rows($result) > 0) {
                $user= mysqli_fetch_assoc($result);
                $_SESSION['user_id']=$user['id'];
                // Login successful, redirect to the dashboard or any other page
                header("Location: ../DearDiary.html");
                exit();
            } else {
                // Login failed, display an error message
                $error = "Invalid username or password";
            }
        } else {
            // Error in getting the result
            $error = "Error in getting the result: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        $error = "Error in preparing the statement: " . mysqli_error($conn);
    }

   
    }
}
?>