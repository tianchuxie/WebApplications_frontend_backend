<?php

  session_start();
  require_once("support.php");
  $body = <<<DATA
  <h1>Grades submited and e-mail confirmation sent. <br/>
      This is Submission 1</h1>
DATA;

  session_destroy();
	unset($_SESSION['courseinfo']);
	unset($_SESSION['studentinfo']);
	unset($_SESSION['studentgrades']);
    $page = generatePage($body, "Grades Submission System");
            echo $page;
            
    
?>