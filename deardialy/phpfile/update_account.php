<?php
// Assuming you have a database connection established
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_id=$_SESSION['user_id'];

    // Perform the update operation in the database
    $sql = "UPDATE users SET user_name = '$username', email = '$email', password = '$password' WHERE id = '$user_id'"; // Replace 'users' with your table name and 'id' with the appropriate identifier column
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Update successful
        header("Location:../login.html");
        exit;
    } else {
        // Update failed
        $error = "Failed to update account settings.";
    }
}
?>