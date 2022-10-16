<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styleModule3.css">
    <title>News Site Database</title>
</head>
<body>
    <?php
        session_start();
        
        
      //this file is used for the log in page for the website, it checks the users password from the database. used 330 wiki for this
        
        require 'database.php';
        
        // Use a prepared statement
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
       

   ?>

</body>
</html>