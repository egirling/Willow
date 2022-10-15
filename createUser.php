<?php
    session_start();

    $connection = new mysqli ($_SESSION['servername'],$_SESSION['username'],$_SESSION['password'],  $_SESSION['database']);

    if ($connection->connect_error){
     die("Connection failed:" .$connection->connect_error);
 }

    $user= (string)$_POST['newuser'];
    $passw= (string)$_POST['newpassword'];

    //hashes password and creates new user 
    $passw= password_hash($passw, PASSWORD_DEFAULT);
    if (!empty($user) && !empty($passw)){
        $insert = $connection->prepare("INSERT INTO accounts(username, password) VALUES (?, ?)"); 
        $insert->bind_param('ss', $user, $passw);
        $insert->execute();
        $insert->close();
        
        $_SESSION['user_id'] = $username;
        $_SESSION['loggedIn'] = "true";
        $url = "/~gkankipati/loginPage.php";
        $newurl = urlencode($url); 
        header("Location: $url");
        exit();
    }else{
        echo htmlentities("missing input");
    }

   
?>