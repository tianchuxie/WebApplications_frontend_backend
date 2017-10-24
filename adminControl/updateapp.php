<?php
require_once("support.php");
    if (isset($_POST["return"])){
    header ("Location: main.html");
   }
   
   
    session_start();
    $emailf = $_POST["email"];
   
    $passf = $_POST["password"];
    $pass = $passf;
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
                
                $_SESSION["email"] = $emailt;
                
                $found = true;
				$body .= <<< DATA
    <form action="afterupdate.php" method="post">
        <p>
			Name:<input type="text" name="name" required = "true" value = $namet />
		</p>
        
        <p>
			Email:<input type="text" name="email" required = "true" value = $emailt />
		</p>
        
        <p>
			GPA:<input type="text" name="gpa" required = "true" value = $gpat />
		</p>
        
        <p>
				Year:
DATA;
            if ($yeart == 10){
                $body .=<<< DATA
				<input type="radio" name="year" value="10" checked = "checked">10
				<input type="radio" name="year" value="10">11
				<input type="radio" name="year" value="10" required = "true">12
DATA;
            } elseif ($yeart == 11){
                $body .=<<< DATA
				<input type="radio" name="year" value="10" >10
				<input type="radio" name="year" value="10"checked = "checked">11
				<input type="radio" name="year" value="10" required = "true">12
DATA;
            } else {
                $body .=<<< DATA
				<input type="radio" name="year" value="10" >10
				<input type="radio" name="year" value="10">11
				<input type="radio" name="year" value="10" required = "true" checked = "checked">12
DATA;
            }

        $body .=<<< DATA
		
		</p>
        
        <p>
			Gender:
DATA;

        if ($gendert == "M"){
            $body .= <<< DATA
            <input type="radio" name="gender" value="M" checked = "checked">M
			<input type="radio" name="gender" value="F" required = "true">F
DATA;
        } else {
            $body .= <<< DATA
            <input type="radio" name="gender" value="M">M
			<input type="radio" name="gender" value="F" required = "true" chekced = "checked">F
DATA;
        }
        $body .=<<< DATA
		</p>
        
        <p>
			Password:<input type="password" name="password" required = "true" value = $pass />
		</p>
        
        <p>
			Verify Password:<input type="password" name="rpassword" required = "true" value = $pass />
		</p>
        
        <p>
            <input type="submit" name="submitInfoButton" />
        </p>
    
    </form>
DATA;
                } 
     		}
            
            if ($found == false){
                $body .= "No entry exists in the database for the specified email and password";
            }
		}
		mysqli_free_result($result);
	}  else {
		$body .= "Retrieving records failed.".mysqli_error($db);
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