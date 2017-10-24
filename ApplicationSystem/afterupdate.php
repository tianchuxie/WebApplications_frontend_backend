<?php
	require_once("support.php");
    session_start();
    $emailupdate = $_SESSION['email'];
        
   
    $body = "<h2><u>After editing some of the data</u></h2>";

	$host = "localhost";
	$user = "dbuser";
	$password = "goodbyeWorld";
	$database = "applicationdb";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
	
	/* Friend to add to table */
	$name = ltrim(rtrim($_POST["name"]));
   $email = trim($_POST["email"]);
   $gpa = trim($_POST["gpa"]);
   $year = trim($_POST["year"]);
   $gender = trim($_POST["gender"]);
   $pass = trim($_POST["password"]);
   $rpass = trim($_POST["rpassword"]);
   if ($pass != $rpass){
    $body .= "Password and password verification values do not match";
   } else {
    $pass = crypt($pass, 'ABCDEF');
	$sqlQuery = sprintf("update $table set name='%s',email='%s', gpa='%s', year='%s', gender='%s', password='%s'
                        where email='%s'", $name,$email, $gpa, $year, $gender, $pass, $emailupdate); 
	$result = mysqli_query($db, $sqlQuery);
	
	if ($result) {
		$body .= <<< DATA
        <p><b>The following entry has been updated to the database</b></p>
        <p>Name : $name <br/>
        Email: $email<br/>
        Gpa: $gpa<br/>
        year: $year<br/>
        gender: $gender<br/>
        </p>
DATA;
	} else { 				   ;
		$body = "Inserting records failed.".mysqli_error($db);
	}
   }	
	/* Closing */
	mysqli_close($db);
	 $body .= <<< DATA
     <form action="main.html" method="post">
        <input type="submit" name="return" value = "Return to main menu"/>
     </form>
DATA;
	echo generatePage($body);
     session_destroy();
	unset($_SESSION['email']);

function connectToDB($host, $user, $password, $database) {
	$db = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Connect failed.\n".mysqli_connect_error();
		exit();
	}
	return $db;
}
?>