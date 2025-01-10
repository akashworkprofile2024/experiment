<?php

$name = $_POST['fname'];
$lname = $_POST['lname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
     <style>
        /* Hide the button when printing */
        @media print {
            button {
                display: none;
            }
        }
</style>
<body>
     <p>Name: <?php echo $name?></p>
     <p>Last-Name: <?php echo $lname?></p><br>

     <button onclick="window.print()">Print this page</button>
</body>
<script>
      
</script>
</html>