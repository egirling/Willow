<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>WILLOW: Not your parents basement</title>
</head>

<body>
    <h1><strong>WILLOW</strong></h1>
    <h2><em>Not Your Parent's Basement</em></h2>
    <?php
    //this is the start page for the website. users can choose to log in, sign up or continue as guest
    session_start();
    $_SESSION['user_id'] = null;
    ?>
    <div class = "box">
    <form action="login.php">
        <input type='submit' value="Login" class="button-33" />
    </form>
    <form action="signupHack.php">
        <input type='submit' value="Sign Up" class="button-33"/>
    </form>
    <form action="listings.php">
        <!--homepage-->
        <input type="submit" value="Continue as Guest" class="button-33"/>
    </form>
</div>


</body>

</html>