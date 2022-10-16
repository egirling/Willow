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
     
     $stmt = $mysqli->prepare("SELECT COUNT(*), userId, hashed_password FROM employees WHERE userName=?");
        
        // Bind the parameter
        $stmt->bind_param('s', $user);
        $user = $_POST['username'];
        $stmt->execute();
        
        // Bind the results
        $stmt->bind_result($cnt, $user_id, $pwd_hash);
        $stmt->fetch();
        
        $pwd_guess = $_POST['password'];
        // Compare the submitted password to the actual password hash
        
        if($cnt == 1 && password_verify($pwd_guess, $pwd_hash)){
            // Login succeeded!
            $_SESSION['user_id'] = $user_id;
            $_SESSION['token'] = bin2hex(random_bytes(32));
            // Redirect to your target page
            Header("Location: home.php");
        } else{
            // Login failed; redirect back to the login screen
            Header("Location: login.php");
        }
     //takes the user to the log in page
     //Header("Location: login.php");
     Header("Location: uploadProfile.php");

        
   ?>

</body>
</html>