<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styleModule3.css">
    <title>News Site Sign Up</title>
</head>
<body>
<div id="main">
<!-- code refactored from module 2-->
<!-- this page is the sign up page for our website-->
<?php
    session_start();
?>
<!--used 330 website for help-->
    <form action="signupDatabase.php" method="POST">
    <p>
		<label for="usernameinput">Username:</label>
		<input type="text" name="username" id="usernameinput" />
        <label for="passwordinput">Password:</label>
		<input type="text" name="password" id="passwordinput" />
	</p>
    <p>
		<input type="submit" value="Sign Up" />
	</p>
    </form>
   
   

</div>
</body>
</html>