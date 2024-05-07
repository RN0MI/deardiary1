<?php
// Connect to the database
include('db_connection.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login if not logged in
} else {
    $user_id = $_SESSION['user_id'];

    // Retrieve calendar data from the database
    $sql = "SELECT * FROM diary_entries WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $date = $row['date'];
            $character = $row['character_name'];
            $wallpaperColor = $row['color'];
            $mood = $row['mood'];

            $data[] = array(
                'date' => $date,
                'mood' => $mood,
                "character"=>$character,
                'wallpaperColor' => $wallpaperColor
            );
        }

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($data);
        
    }
}

// Close the database connection
$conn->close();
?>