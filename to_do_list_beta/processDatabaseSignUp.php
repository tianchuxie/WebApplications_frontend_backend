<?php
    
	require_once("support.php");
	require_once("databaseClass.php");
	$scriptName = $_SERVER["PHP_SELF"];
	
    if (isset($_POST["returnButton"])) {
        header("Location: main.php");
    }
    
    if (isset($_POST["submitButton"])) {
        $new_db = new databaseMysql("localhost", "dbuser", "goodbyeWorld", "applicationdb", "logInInfo");
		$username = trim($_POST["nameSubmit"]);

        $pd = trim($_POST["firstPassword"]);
		$salt = strrev($pd); 
		$enpd = crypt($pd, $salt);
		
		$sqlQuery = "select * from $new_db->table";
		$result = $new_db->db->query($sqlQuery);
		
		if (!$result) {
			$sqlQuery = "create table $new_db->table (username varchar(50) primary key, password varchar(100), docName varchar(20) NOT NULL, docMimeType varchar(512) NOT NULL, docData longblob NOT NULL)";
			$result = $new_db->db->query($sqlQuery);
		}
		
		$sqlQuery = "select * from $new_db->table where username = '$username'";
		$result = $new_db->db->query($sqlQuery);
		$result->data_seek(0);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if ($row['username'] == $username) {
			echo "The account already exists in the system.";
			$body =<<< EOBODY
				<form action="$scriptName" method="post">
					<p>
						<input type="submit" name="returnButton" value="Return to main menu" />
					</p>
				</form>		
EOBODY;
			$page = generatePage($body);
			echo $page;
		} else {
			$nameAvatar = $username."Avatar";
			$typeAvatar = $_FILES['uploadedFile']['type'];
			$tempAvatar = $_FILES['uploadedFile']['tmp_name'];
			$errorAvatar = $_FILES['uploadedFile']['error'];
			$contentAvatar = addslashes(file_get_contents($tempAvatar));
				
			if ($errorAvatar > 0) {
				echo "The image uploaded failed.";
				$body =<<< EOBODY
					<form action="$scriptName" method="post">
						<p>
							<input type="submit" name="returnButton" value="Return to main menu" />
						</p>
					</form>		
EOBODY;
				$page = generatePage($body);
				echo $page;
			} else {
				if ($typeAvatar != "image/jpeg") {
					echo "The format not allowed.";
					$body =<<< EOBODY
					<form action="$scriptName" method="post">
						<p>
							<input type="submit" name="returnButton" value="Return to main menu" />
						</p>
					</form>		
EOBODY;
					$page = generatePage($body);
					echo $page;
				} else {
				
					$query = "insert into $new_db->table (username, password, docName, docMimeType, docData) values('$username', '$enpd', '$nameAvatar', '$typeAvatar', '{$contentAvatar}')";
       
					$result = $new_db->db->query($query);
		
					$body =<<< EOBODY
						<form action="$scriptName" method="post">
							<h1>The following account has been created</h1>
							<p>
								<strong>Username: </strong>$username<br /><br />
								<input type="submit" name="returnButton" value="Return to main menu" />
							</p>
						</form>
EOBODY;
					$page = generatePage($body);
					echo $page;
				}
			}
		}
    }
?>