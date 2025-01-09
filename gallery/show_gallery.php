<?php
$conn = mysqli_connect('localhost', 'root', '', 'demo');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    echo 'connected';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gallery img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }
        .gallery .col {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Image Gallery</h1>
        <?php
        $result = $conn->query("SELECT * FROM gallery");
        if ($result->num_rows > 0) {
            echo "<div class='row gallery'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 col-sm-6'>";
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Gallery Image" class="img-fluid">';
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p class='text-center'>No images found in the gallery.</p>";
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>