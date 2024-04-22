<?php


include_once 'db.php';
echo "AICI!";
if(isset($_POST['signup']))
{  
    echo "AICI!";
    $username = $_POST["username"];
    $pass = $_POST["password"];

     $sql = "INSERT INTO users (username, password) VALUES ('$username','$pass')";
   
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        header("Location: http://localhost/WD_final_project/login.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}


?>