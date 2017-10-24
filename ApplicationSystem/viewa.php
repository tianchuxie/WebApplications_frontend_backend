<?php
  include "support.php";
  if (isset($_POST["submitInfoButton"])) {
    $emailf = $_POST["email"];
    $passf = $_POST["password"];
    session_start();
    $_SESSION["email"] =  $emailf;
    $_SESSION["password"] = $passf;
    header("Location: reviewapp.php");
  }
  
  
  $submit = $_SERVER["PHP_SELF"];
  $body =<<< DATA
        <h2><u>After returning to the main menu, selecting
        "Review Application", and entering data</u></h2>
         <form action="$submit" method="post">
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
?>