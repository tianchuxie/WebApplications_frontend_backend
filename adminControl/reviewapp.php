<?php
require_once("support.php");
    if (isset($_POST["return"])){
    header ("Location: main.html");
   }
    session_start();
    $emailf = $_SESSION['email'];
    $passf = $_SESSION['password'];
    $passf = crypt($passf, 'ABCDEF');
	$host = "localhost";
	$user = "dbuser";
	$password = "goodbyeWorld";
	$database = "applicationdb";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
	
	$sqlQuery = sprintf("select * from %s", $table);
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$numberOfRows = mysqli_num_rows($result);
 	 	if ($numberOfRows == 0) {
			$body = "<h1>No entries exists in the table</h1>";
		} else {
			$body =<<< DATA
                <h2><u>After selecting "Submit"</u></h2>
DATA;
            $found = false;
			while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $namet = $recordArray['name'];
		     	$emailt = $recordArray['email'];
                $gpat = $recordArray['gpa'];
                $yeart = $recordArray['year'];
                $passt = $recordArray['password'];
                $gendert = $recordArray['gender'];
                
				if ($emailf == $emailt && $passf == $passt){
                $found = true;
				$body .=<<< DATA
                       <p>
                        <b>Application found in the database with the following values:</b><br/>
                        </p>
                        
                        <p>
                        Name: $namet <br/>
                        Email: $emailt <br/>
                        Gpa: $gpat <br/>
                        Year: $yeart <br/>
                        Gender: $gendert
                        </p>
DATA;
                }
     		}
            
            if ($found == false){
                $body .= "No entry exists in the database for the specified email and password";
            }
		}
		mysqli_free_result($result);
	}  else {
		$body = "Retrieving records failed.".mysqli_error($db);
	}
		
	/* Closing */
	mysqli_close($db);
    $body .= <<< DATA
     <form action="main.html" method="post">
        <input type="submit" name="return" value = "Return to main menu"/>
     </form>
DATA;
	
	echo generatePage($body);

function connectToDB($host, $user, $password, $database) {
	$db = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Connect failed.\n".mysqli_connect_error();
		exit();
	}
	return $db;
}
?>