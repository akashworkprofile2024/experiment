<?php
$hostname='localhost';
$user='root';
$pass='';
$db='printtopdf';

$conn=mysqli_connect($hostname,$user,$pass,$db);
if(!$conn){
    die('Connection Failed: '.mysqli_connect_error());
}else{
    // echo 'Connected';
}

$id_number = 1;

$sql="SELECT * FROM clients WHERE id='$id_number'";
$store=$conn->query($sql);
$num=mysqli_num_rows($store);
$row=mysqli_fetch_row($store);

// GET INDIVIDUAL CLIENT DATA
$name=$row[1];
$lname=$row[2];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @media print{
        button{
            display:none;
        }
    }
</style>
<body style="background-color:black;color:white">
    <?php   
       echo 'Name: ' . $name . '<br>';
       echo 'Last-Name: ' . $lname;
    ?><br>
    <button onclick="window.print()">Print</button>
    
</body>
</html>