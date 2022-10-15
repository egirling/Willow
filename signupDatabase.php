<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" type="text/css" href="styleModule3.css">-->
    <title>Signup Database</title>
</head>
<body>
    <?php
    //this page is the sign up page for the website. users can create new users 
    session_start();
     require 'database.php';
     $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
     $username = $_POST["username"];

     //this inserts the username and hashed password into the database
     $stmt = $mysqli->prepare("insert into employees (userName, hashed_password) values (?, ?)");
     if(!$stmt){
         printf("Query Prep Failed: %s\n", $mysqli->error);
         exit;
     }
     
     $stmt->bind_param('ss', $username, $password);
     
     $stmt->execute();
     
     $stmt->close();
     
     //takes the user to the log in page
     Header("Location: login.php");

        
   ?>

</body>
</html>