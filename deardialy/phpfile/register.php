<?php
include('db_connection.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email=$_POST["email"];
    $confirmPassword = $_POST["confirm_password"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];

    // Validate the form data (you can add more validation if needed)
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $error = "Please fill in all fields";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match";
    } else {
    
        // Check if the username already exists in the database
        $query = "SELECT * FROM users WHERE user_name = ? ";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $error = "Username already exists";
        } else {
            // Insert the new user into the database
            $query = "INSERT INTO users (user_name, email, password, birthdate, gender) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $password, $birthdate, $gender);
           $execute= mysqli_stmt_execute($stmt);
            if($execute){
              // Redirect to the login page or any other page
            header("Location:../login.html");
            }else{
              echo mysqli_error($conn);
            }

            
        }
    }
}
?>