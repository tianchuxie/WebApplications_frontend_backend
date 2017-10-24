<?php
    include "support.php";
    if(isset($_POST["submitApp"])){  
        header("Location: submitapp.php");
     }
     if(isset($_POST["ReviewApp"])){
		header("Location: viewa.php");
        
     }
     if(isset($_POST["UpdateApp"])){  
        $body =<<< DATA
        <h2><u>After returning to the main menu, selecting
        "Update Application", and entering data</u></h2>
         <form action="updateapp.php" method="post">
            <p>Email associated with application:
            <input type="text" name="email" required = "true"/>
            </p>
            <p>
			Password associated with application:
            <input type="password" name="password" required = "true"/>
            </p>
            <p>
            <input type="submit" name="submitInfoButton" />
            </p>
        <p>
			<input type="submit" name="return" value = "Return to main menu"/>
		</p>
         </form>
DATA;
        echo generatePage($body);
     }
     if(isset($_POST["admini"])){  
        require_once("support.php");

// IMPORTANT: This is just an example and you do not want to have plain passwords like this

$user = "main";
$password = "terps";
$passf = crypt($password, 'ABCDEF');

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) &&
    $_SERVER['PHP_AUTH_USER'] == $user && crypt($_SERVER['PHP_AUTH_PW'],'ABCDEF') == $passf){
		header ("Location: admini.php");	
	} else {
		header("WWW-Authenticate: Basic realm=\"Example System\"");
		header("HTTP/1.0 401 Unauthorized");
		exit;
	}
     }
?>