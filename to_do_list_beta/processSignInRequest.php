<?php
  
	require_once("support.php");
	require_once("databaseClass.php");
	$scriptName = $_SERVER["PHP_SELF"];
	$cookieName = "todolistSystem";
	
	if (isset($_POST["returnButton"])) {
        header("Location: main.php");
    }
	
    if (isset($_POST["loginButton"])) {
        $body =<<< EOBODY
		<script>
			function validateForm() {
				var nameLogIn = document.getElementById("nameLogIn").value;
				var passwordLogIn = document.getElementById("passwordLogIn").value;
    
				var invalidMessages = "";
    
				if (nameLogIn.length == 0 || passwordLogIn.length == 0) {
				    invalidMessages = "Please fill in blanks";
				}
				if (invalidMessages !== "") {
				    alert(invalidMessages);
				    return false;
				} else {
				    return true;
				}
			}
		</script>
		
        <form action="$scriptName" method="post">
            <p>
        		<strong>User Name: </strong><input type="text" id="nameLogIn" name="nameSubmit" /><br /><br />
                <strong>Password: </strong><input type="password" id="passwordLogIn" name="Password" /><br /><br />
                <input type="submit" name="logInButton" onclick="return(validateForm())" value="Log In" />&nbsp;&nbsp;
                <input type="submit" name="returnButton" value="Return to main menu" />
            </p>
        </form>
		
EOBODY;
    
		$page = generatePage($body);
		echo $page;
    }
	
	if (isset($_POST["signUpButton"])) {
        header("Location: processSignUp.php");
    } else {
	
	if (!isset($_COOKIE['todolistSystem'])) {
		if (isset($_POST["logInButton"])) {
		    $new_db = new databaseMysql("localhost", "dbuser", "goodbyeWorld", "applicationdb", "logInInfo");
			
			$username = trim($_POST["nameSubmit"]);
		    $pd = trim($_POST["Password"]);
			$salt = strrev($pd); 
			$enpd = crypt($pd, $salt);
			session_start();
			
			$sqlQuery = "select * from $new_db->table where username = '$username'";
			$result = $new_db->db->query($sqlQuery);
			
			if (!$result) {
				echo "This account is not existing in the system";
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
				$result->data_seek(0);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				
				if ($row['username'] != $username) {
					echo "This account is not existing in the system";
						$body =<<< EOBODY
						<form action="$scriptName" method="post">
							<p>
								<input type="submit" name="returnButton" value="Return to main menu" />
							</p>
						</form>		
EOBODY;
					$page = generatePage($body);
					echo $page;
				} else if ($row['password'] != $enpd) {
					echo "The password is incorrect.";
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
					$_SESSION['username'] = $username;
					setcookie($cookieName, $username);
					header("Location: function.php");
				}
			}
		}
	} else {
		header("Location: function.php");
	}
		
	}
?>