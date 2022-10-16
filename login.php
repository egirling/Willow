

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Willow NYPB</title>
</head>
<body>
<div id="main">
<?php
    session_start();
?>
<div class = "boxLogin">
    <form action="loginDatabase.php" method="POST" class = "login_form">
    <p>
		<label for="usernameinput">Username:</label>
		<input type="text" name="username" id="usernameinput" />
        <br><br>
        <label for="passwordinput">Password: </label>
		<input type="text" name="password" id="passwordinput" />
	</p>
    
    <p>
		<input type="submit" value="Log In" class="loginBtn"/>
	</p>
    </form>
</div>
   

</div>
</body>
</html>