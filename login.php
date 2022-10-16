

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <!-- <link rel="stylesheet" type="text/css" href="styleModule3.css">-->
    <title>Hackathon Login</title>
</head>
<body>
<div id="main">
<?php
    session_start();
?>
    <form action="loginDatabase.php" method="POST">
    <p>
		<label for="usernameinput">Username:</label>
		<input type="text" name="username" id="usernameinput" />
        <label for="passwordinput">Password:</label>
		<input type="text" name="password" id="passwordinput" />
	</p>
    <p>
		<input type="submit" value="Log In" />
	</p>
    </form>
   

</div>
</body>
</html>