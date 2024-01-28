<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['new_picture']) && $_FILES['new_picture']['error'] === UPLOAD_ERR_OK) {
        // Specify the directory to save the uploaded picture
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['new_picture']['name']);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $uploadFile)) {
            // Update the user's picture in the database or wherever it is stored
            // For example, you might use the username to identify the user
            $username = $_SESSION['username'];
            // Update the picture in the database (Replace this with your actual database update logic)

            // Redirect to the user's profile page or wherever you want after updating
            header("Location: user_profile.php");
            exit();
        } else {
            echo "Error uploading file.";
        }
    }
}
?>