<?php
$hostname='localhost';
$user='root';
$pass='';
$db='printtopdf';

$conn=mysqli_connect($hostname,$user,$pass,$db);
if(!$conn){
    die('Connection Failed: ' . mysqli_connect_error());  
}else{
    echo 'Connected';   
}

if(isset($_POST['submit2']))
{
$name=$_POST['clientname'];
$lname=$_POST['clientsirname'];

$sql="INSERT INTO clients(name,lname)VALUES('$name','$lname')";
$runsql=mysqli_query($conn,$sql);


echo 'Client details submitted';

}

?>