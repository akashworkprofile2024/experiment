<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #212121; color: white;">
    <form action="../gallery/upload_only10mb_file.php" method="POST" enctype="multipart/form-data">
        Image: <input type="file" id="image" name="image" required>
        <input type="submit" name="submit" value="upload"><br>
    </form><br>

    <button><a href="../gallery/show_gallery.php" style="text-decoration: none; color: black;">Show_Gallery</a></button>
</body>
</html>




