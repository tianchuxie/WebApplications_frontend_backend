<?php
    
    require_once("support.php");
    $body =<<< EOBODY
		<script>
			function validateForm() {  
				var nameSignUp = document.getElementById("nameSignUp").value;
				var passwordSignUp1 = document.getElementById("passwordSignUp1").value;
				var passwordSignUp2 = document.getElementById("passwordSignUp2").value;
				var file = document.getElementById("file").value;
				
				var invalidMessages = "";
				if (nameSignUp.length == 0 || passwordSignUp1.length == 0 ||
				    passwordSignUp2.length == 0) {
				    invalidMessages = "Please fill in blanks";
				} else if (file.length == 0) {
					invalidMessages = "Please choose a image to be your avatar.";
				} else {
					if (passwordSignUp1 != passwordSignUp2) {
						invalidMessages = "Password and password verification values do not match.";
					}
				}
    
				if (invalidMessages !== "") {
				    alert(invalidMessages);
				    return false;
				} else {
				    return true;
				}
			}
		</script>
	
        <form action="processDatabaseSignUp.php" enctype="multipart/form-data" method="post">
            <p>
                <strong>User Name: </strong><input type="text" id="nameSignUp" name="nameSubmit" /><br /><br />
                <strong>Password: </strong><input type="password" id="passwordSignUp1" name="firstPassword" /><br /><br />
                <strong>Confirm Password: </strong><input type="password" id="passwordSignUp2" name="secondPassword" /><br /><br />
                <strong>Select image to be your Avatar (jpg): </strong><input type="file" id="file" name="uploadedFile" /><br /><br />
                <input type="submit" name="submitButton" onclick="return(validateForm())" value="Submit" />&nbsp;&nbsp;
                <input type="submit" name="returnButton" value="Return to main menu" />
            </p>
		</form>
EOBODY;
    
    $page = generatePage($body);
	echo $page;

?>