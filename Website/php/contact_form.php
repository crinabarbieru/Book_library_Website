<?php


include_once 'db.php';
if(isset($_POST['submit']))
{  
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];

     $sql = "INSERT INTO contact_form (first_name, last_name, email, answer) VALUES ('$first_name','$last_name','$email', '$subject')";
   
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}


?>