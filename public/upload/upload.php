<?php
// MySQL database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kms";

// Make connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection and throw error if not available
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["image"]) && !empty($_POST["image"])) {
    $base64_image = $_POST["image"];
    
    // Decode base64 image
    $imgContent = base64_decode($base64_image);

    // Insert image data into the existing 'activity_images' table
    $sql = "INSERT INTO activity_images (blob_image, activity_id) VALUES (?, ?)";
    $statement = $conn->prepare($sql);
    $activity_id = $_POST['activity_id']; // Assuming you're sending activity_id from your frontend
    $statement->bind_param('si', $imgContent, $activity_id); // 'si' represents a blob and an integer
    $result = $statement->execute();  // Use execute() to perform the query

    if ($result) {
        echo "Image uploaded successfully.";
    } else {
        echo "Image upload failed, please try again. Error: " . $conn->error;
    }
} else {
    echo "Please provide a base64-encoded image to upload.";
}

// Close the database connection
$conn->close();
?>