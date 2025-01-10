<?php
$hostname = 'localhost';
$user = 'root';
$pass = '';
$db = 'gallery';

$conn = mysqli_connect($hostname, $user, $pass, $db);
if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
} else {
    echo 'Connected';
}

if (isset($_POST['submit'])) {
    $imagename = $_FILES['image']['name']; // Store file name
    $imagedata = $_FILES['image']['tmp_name']; // Temp name store
    $imageSize = $_FILES['image']['size']; // File size
    $imageType = mime_content_type($imagedata); // MIME type

    // Validate file size (2MB = 2 * 1024 * 1024 bytes)
    if ($imageSize > 2 * 1024 * 1024) {
        echo 'Error: File size exceeds 2MB.';
        exit();
    }

    // Validate MIME type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($imageType, $allowedTypes)) {
        echo 'Error: Invalid file type. Only JPEG, PNG, and GIF files are allowed.';
        exit();
    }

    // Move the uploaded file to the "image" directory
    $targetDir = 'image/';
    $targetFile = $targetDir . basename($imagename);
    if (move_uploaded_file($imagedata, $targetFile)) {
        // Insert into database
        $sql = "INSERT INTO storeimg(image) VALUES('$imagename')";
        if (mysqli_query($conn, $sql)) {
            echo 'Upload success';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error: Failed to move uploaded file.';
    }
}

?>
