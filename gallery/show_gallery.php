<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gallery-box {
            width: 100%;
            height: 200px; /* Set a fixed height for all boxes */
            overflow: hidden; /* Ensures content doesn't overflow the box */
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .gallery-box img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the box entirely */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Image Gallery</h1>
        <div class="row gy-4">
            <?php
            $hostname = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'gallery';

            $conn = mysqli_connect($hostname, $user, $pass, $db);

            if (!$conn) {
                die('Connection Failed: ' . mysqli_connect_error());
            }

            $sql = "SELECT image FROM storeimg";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = "image/" . $row['image'];
                    echo "
                        <div class='col-sm-6 col-md-4 col-lg-3'>
                            <div class='gallery-box'>
                                <img src='$imagePath' alt='Image'>
                            </div>
                        </div>
                    ";
                }
            } else {
                echo "<p class='text-center'>No images found.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
