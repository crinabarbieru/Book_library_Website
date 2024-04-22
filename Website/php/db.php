<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "wd_project";
$conn=mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn){
      die('Could not Connect MySql Server:');
    }
    
?>
