<?php
$hostname='localhost';
$user='root';
$pass='';
$db='gallery';

$conn = mysqli_connect($hostname,$user,$pass,$db);
if(!$conn){
   die('Connection Failed: '.mysqli_connect_error());
}else{
   echo 'Connected';
}

if(isset($_POST['submit'])){
   
   $imagename = $_FILES['image']['name']; // store file name
   $imagedata = $_FILES['image']['tmp_name']; // temp name store

   move_uploaded_file($imagedata,"image/$imagename");
   
   $sql = "INSERT INTO storeimg(image)VALUES('$imagename')";
   $runsql = mysqli_query($conn,$sql);


   // message

   echo 'Upload success';

}



?>