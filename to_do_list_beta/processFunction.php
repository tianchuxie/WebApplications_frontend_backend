<?php

	$cookieName = "todolistSystem";
  
    if (isset($_POST["addTask"])) {
        header("Location: processAddTask.php");
    }
	if (isset($_POST["showTasks"])) {
        header("Location: processDisplayTask.php");
    }

    if (isset($_POST["logoutButton"])) {
        setcookie($cookieName, "", time() - 3600);
		header("Location: main.php");
    }
	
	if (isset($_POST["backButton"])) {
		header("Location: main.php");
    }
?>