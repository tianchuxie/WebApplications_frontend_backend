<?php
   require_once("support.php");	
   if (isset($_POST["return"])){
    header ("Location: main.html");
   }
   $body = <<< DATA
   <h2><u>After selecting "Submit Data"</u></h2>
DATA;
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
    $host = "localhost";
	$user = "dbuser";
	$password = "goodbyeWorld";
	$database = "applicationdb";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
    $sqlQuery = sprintf("insert into $table (name,email, gpa, year, gender, password)
                values ('%s', '%s', '%s', '%s', '%s', '%s')", 
				$name, $email, $gpa, $year, $gender, $pass);
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$body .= <<< DATA
        <p><b>The following entry has been added to the database</b></p>
        <p>Name : $name <br/>
        Email: $email<br/>
        Gpa: $gpa<br/>
        year: $year<br/>
        gender: $gender<br/>
        </p>
DATA;
	} else { 				   
		$body .= "Inserting records failed.".mysqli_error($db);
	}
		
	/* Closing */
	mysqli_close($db);
    $body .= <<< DATA
     <form action="main.html" method="post">
        <input type="submit" name="return" value = "Return to main menu"/>
     </form>
DATA;
    
   }
   echo generatePage($body, "Grades Submission System");
   
   
   function connectToDB($host, $user, $password, $database) {
	$db = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Connect failed.\n".mysqli_connect_error();
		exit();
	}
	return $db;
}
?>