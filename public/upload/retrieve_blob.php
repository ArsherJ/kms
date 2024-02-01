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

// Check if the activity_id is provided
if (isset($_GET['activity_id'])) {
    $activity_id = $_GET['activity_id'];

    // Retrieve images for the given activity_id
    $sql = "SELECT blob_image FROM activity_images WHERE activity_id = ?";
    $statement = $conn->prepare($sql);

    if (!$statement) {
        die("Prepare failed: " . $conn->error);
    }

    $statement->bind_param('i', $activity_id);

    if (!$statement->execute()) {
        die("Execute failed: " . $statement->error);
    }

    $result = $statement->get_result();

    if (!$result) {
        die("Get result failed: " . $conn->error);
    }

    // Fetch and output images
    while ($row = $result->fetch_assoc()) {
        $imageData = $row['blob_image'];
        echo base64_encode($imageData); // Output the base64-encoded image data
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Please provide an activity_id.";
}
?>