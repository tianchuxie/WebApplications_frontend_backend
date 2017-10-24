<!doctype html>

<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>ToDoList System</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script src="displayRealtime.js"></script>
    </head>
	
	<body onload="displayTime()">
		<div>
			<header id="header" class="clear"> 
				<div id="logo">
					<h1>ToDoList System</h1>
				</div>  
			</header>
		</div>
		<form action="processFunction.php" method="post">
            <p>&nbsp;&nbsp;<img src="umdLogo.gif" /></p>
            <p><hr /></p>
			<p>
				&nbsp;<?php
						session_start();
						$username1 = $_SESSION['username'];
						echo "<img src=\"getAvatar.php?fileToRetrieve=$username1\" width='100' height='100' alt=\"User's Avatar\"/>";
					  ?>
					  <br /><br />
                <strong><font size="6">&nbsp;Welcome to ToDoList System</font></strong>
			</p>
			
			<p>
				<br />&nbsp;&nbsp;&nbsp;<input type="submit" name="addTask" value="Add a Task" />
					  &nbsp;&nbsp;&nbsp;<input type="submit" name="showTasks" value="Display Tasks" />
					  &nbsp;&nbsp;&nbsp;<input type="submit" name="logoutButton" value="Log Out" />
					  &nbsp;&nbsp;&nbsp;<input type="submit" name="backButton" value="Return to main menu" />
			</p>
			
			&nbsp;&nbsp;Curren time: <strong id="date"></strong>
			
			<hr />
			<p id="contact">If you have any questions about our program, please contact the system administrator at <a href="mailto:wall0313@gmail.com">wall0313@gmail.com</a></p>
			
		</form>
	</body>
</html>