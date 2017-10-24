<?php
    require_once("support.php");
    session_start();
    
    $body = <<<DATA
        <form action="submitorder.php" method="post">
			<h1>Grades to submit</h1>
         <table border = "1">
          <tr>
             <th>Name</th> <th>Grade</th>
          </tr>
DATA;
    $keys = array_keys($_POST);
	$grd = array();
	foreach ($keys as $key){
        $body .= <<<DATA
          <tr>
            <td>$key</td> <td>$_POST[$key]</td>
          </tr>
DATA;
    $grd[] = $_POST[$key];
	}
	
	$_SESSION["studentgrades"] = $grd;
    
    
    $body .= <<<DATA
    </table>
    <br/>
		<input type="submit" value="Submit" />
       

    
    </form>
    <form action="rewrite.php" method="post">
      <input type="submit" value="Back" />
    </form>
  
    
DATA;
    $page = generatePage($body, "Grades Submission System");
	echo $page;
?>



