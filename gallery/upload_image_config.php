<?php
$hostname='localhost';
$user='root';
$pass='';
$db='demo';

$conn = mysqli_connect($hostname,$user,$pass,$db);
if(!$conn){
   die('Connection Failed: '.mysqli_connect_error());
}
echo 'Connected';

$image = $_FILES['image']['tmp_name'];
$imgdata = addslashes(file_get_contents($image));

$sql=mysqli_connect($conn,"INSERT INTO gallery(image)VALUES('$imgdata')");

?>