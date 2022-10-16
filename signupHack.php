<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Sign Up</title>
</head>
<body>
<div id="main">
<!-- code refactored from module 2-->
<!-- this page is the sign up page for our website-->
<?php
    session_start();
?>
<!--used 330 website for help-->
<div class="boxLogin">
    <form action="signupDatabase.php" method="POST" class = "login_form">
    <p>
		<label for="usernameinput">Username:</label>
		<input type="text" name="username" id="usernameinput" />
<br>
<br>
        <label for="passwordinput">Password: </label>
		<input type="text" name="password" id="passwordinput" />
	</p>
    <p>
		<input type="submit" value="Sign Up" class="loginBtn" />
	</p>
    </form>
</div>
   

</div>
</body>
</html>