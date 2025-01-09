<?php
   $servername ="localhost";
   $user = "root";
   $pass="";
   $db = "demo";

   $conn = mysqli_connect($servername,$user,$pass,$db);
   if(!$conn)
   {
       die("error detected".mysqli_error($conn));
   }else{
      
      echo 'Connected';
      
   }


   $image = $_FILES['image']['tmp_name'];
   $imgdata = addslashes(file_get_contents($image));

   $sql = mysqli_query($conn,"INSERT INTO gallery(image)VALUES('$imgdata')");

   if($conn->query($sql) === True){
      echo 'Image upload successfully';
   }else{
      echo 'Error:'.$conn->error;  
   }
?>