<?php
// MySQL database connection settings
$servername = "127.0.0.1";
$username = "u566515254_kms_username";
$password = "LittleLife12345";
$dbname = "u566515254_kms";
$dbPort = 3306;

// Make connection
$conn = new mysqli($servername, $username, $password, $dbname, $dbPort);

// Check connection and throw an error if not available
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["image"]) && !empty($_POST["image"])) {
    $base64_image = $_POST["image"];
    $activity_id = $_POST['activity_id']; // Assuming you're sending activity_id from your frontend
    $image_reference = $_POST['image_reference'];
    
    // Decode base64 image
    $imgContent = base64_decode($base64_image);

    // Check if the activity ID already has an image with the same reference
    $checkSql = "SELECT * FROM activity_images WHERE activity_id = ? AND image_reference = ?";
    $checkStatement = $conn->prepare($checkSql);
    $checkStatement->bind_param('is', $activity_id, $image_reference);
    $checkStatement->execute();
    $checkResult = $checkStatement->get_result();

    if ($checkResult->num_rows > 0) {
        // If images with the same reference exist, insert the new image
        $insertSql = "INSERT INTO activity_images (blob_image, activity_id, image_reference) VALUES (?, ?, ?)";
        $insertStatement = $conn->prepare($insertSql);
        $insertStatement->bind_param('sis', $imgContent, $activity_id, $image_reference);
        $insertResult = $insertStatement->execute();

        if ($insertResult) {
            echo "Images inserted successfully.";
        } else {
            echo "Failed to insert new images. Error: " . $conn->error;
        }
    } else {
        // If no images exist with the same reference, delete existing images and insert new ones
        $deleteSql = "DELETE FROM activity_images WHERE activity_id = ?";
        $deleteStatement = $conn->prepare($deleteSql);
        $deleteStatement->bind_param('i', $activity_id);
        $deleteResult = $deleteStatement->execute();

        if ($deleteResult) {
            $insertSql = "INSERT INTO activity_images (blob_image, activity_id, image_reference) VALUES (?, ?, ?)";
            $insertStatement = $conn->prepare($insertSql);
            $insertStatement->bind_param('sis', $imgContent, $activity_id, $image_reference);
            $insertResult = $insertStatement->execute();

            if ($insertResult) {
                echo "Images replaced successfully.";
            } else {
                echo "Failed to insert new images. Error: " . $conn->error;
            }
        } else {
            echo "Failed to delete existing images. Error: " . $conn->error;
        }
    }
} else {
    echo "Please provide a base64-encoded image to upload.";
}

// Close the database connection
$conn->close();
?>
