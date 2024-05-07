<?php

include('db_connection.php');   

if (isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login if note  log in
  }
  else{
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $characterName = $_POST['subject'];
        $mood = $_POST['mood'];
        $subject = $_POST['subject'];
        $article = $_POST['article'];
        $color = $_POST['color'];

        $date = date("Y-m-d");
        $user_id= $_SESSION['user_id'];


        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
      
        // Prepare and execute the SQL query to insert the diary entry
        $sql = "INSERT INTO diary_entries (user_id, date,character_name, mood, subject, article, color) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss",$user_id, $date, $characterName, $mood, $subject, $article,$color);
        $stmt->execute();

        if ($stmt->execute() === TRUE) {
            header("Location:../writing_diary_page.html");
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
        }
        
      
        // Close the database connection
        $stmt->close();
        $conn->close();
      
      }
  }


?>