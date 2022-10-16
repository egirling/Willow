<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <!--<link rel="stylesheet" type="text/css" href="styleModule3.css">-->
    <title>WEBSITE NAME: UNNAMED</title>
</head>
<body>
    <?php
    //this is the start page for the website. users can choose to log in, sign up or continue as guest
    session_start();
    $_SESSION['user_id'] = null;
    ?>
    <form action="login.php">
        <input type='submit' value="Login" />
    </form>
    <form action="signupHack.php">
        <input type='submit' value="Sign Up" />
    </form>
    <form action="listings.php"> <!--homepage-->
        <input type="submit" value="Continue as Guest" />
</form>
  
   
</body>
</html>