<?php
	include "support.php";
if (!isset($_COOKIE['login'])) {
	$body = "";
	if (isset($_POST["submitInfoButton"])) {
		$nameValue = trim($_POST["name"]);
		$passwordValue = trim($_POST["password"]);
		
		if ($nameValue === "") {
			$body .= "Name Value Missing<br />";
		}else if ($passwordValue === "" || ($passwordValue !== "terps") || ($nameValue !== "cmsc298s")){
			$body .= "Invalid Login Information Provided<br />";
			$passwordValue = "";
		} else {
			
			generateCookie();
		}

	} else {
		$nameValue = "";
		$passwordValue = "";
	}
	
	// superglobals are not accessible in heredoc
	$scriptName = $_SERVER["PHP_SELF"];
	$topPart = <<<EOBODY
		<form action="$scriptName" method="post">
		    <h1>Grades Submission System</h1>
			<p>
				Name:<input type="text" name="name" value="$nameValue" />
			</p>
			
			<p>
				Password: <input type="password" name="password" value="$passwordValue"/>
			</p>
			
			<!--We need the submit button-->
			<p>
				<input type="submit" name="submitInfoButton" />
			</p>
		</form>		
EOBODY;
	$body = $topPart.$body;
	} else {
		$body = generateSectionInformation();
	}
	$page = generatePage($body, "Grades Submission System");
	echo $page;

?>



<?php

function generateCookie() {
	
	$name = "login";
			$value = "kid";
			$expiration = time() + 600; 
			$path = "/"; /* a cookie should be sent for any page within the server environment */
			$domain = "";  /* adjust with appropriate domain name */
			$sentOnlyOverSecureConnection = 0; /* 1 for secure connection */
			
			// First cookie
			setcookie($name, $value, $expiration, $path, $domain, $sentOnlyOverSecureConnection);
			
			// Second cookie (will last until end of the session) Close browser and look for it
			setcookie("AsecondCookie", "GoodyBye World");

	
}

function generateSectionInformation() {
	$scriptName = "table.php";
		$body = <<<EOBODY
			<form action="$scriptName" method="post">
			<h1>Section Information</h1>
				<p>
					Course Name (eg. cmsc128): <input type="text" name="coursename" />
				</p>
				<p>
					section (eg.0101):<input type="text" name="section" />
				</p>
			
				<!--We need the submit button-->
				<p>
					<input type="submit" name="submitInfoButton" />
				
				</p>
			</form>		
EOBODY;
		return $body;
}
?>