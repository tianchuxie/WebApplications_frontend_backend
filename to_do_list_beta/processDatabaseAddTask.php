<?php
    
	require_once("support.php");
	require_once("databaseClass.php");
	$scriptName = $_SERVER["PHP_SELF"];
	session_start();
	
    if (isset($_POST["returnButton"])) {
        header("Location: function.php");
    }
    
    if (isset($_POST["submitButton"])) {
		$new_db = new databaseMysql("localhost", "dbuser", "goodbyeWorld", "applicationdb", "tasks");
        
        $username = $_SESSION['username'];
		$title = trim($_POST["title"]);
		$type = trim($_POST["type"]);
		$dueDate = $_POST["dueDate"];
		$description = nl2br($_POST["description"]);
		
        $query = "select * from $new_db->table where username = '$username'";
        
        $result = $new_db->db->query($query);
        
        if (!$result) {
            $query = "create table $new_db->table (username varchar(50), title varchar(200), type varchar(200),date DATE, content text, done TINYINT DEFAULT '0')";
			$result = $new_db->db->query($query);
        }
		
		$query = "insert into $new_db->table (username, title, type, date, content) values('$username', '$title', '$type', '$dueDate', '$description')";
		
		$result = $new_db->db->query($query);
		
		$body =<<< EOBODY
			<form action="$scriptName" method="post">
				<h1>The following entry has been added to the database</h1>
				<p>
					<strong>Title: </strong>$title<br /><br />
					<strong>Type: </strong>$type<br /><br />
					<strong>Due Date: </strong>$dueDate<br /><br />
					<strong>Description: </strong><br />$description<br /><br />
					<input type="submit" name="returnButton" value="Return to main menu" />
				</p>
			</form>
EOBODY;
			$page = generatePage($body);
			echo $page;
		
    }
?>