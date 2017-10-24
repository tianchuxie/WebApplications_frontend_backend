<?php
    
    require_once("support.php");
    $scriptName = $_SERVER["PHP_SELF"];
    session_start();
    
    $body =<<< EOBODY
		<script>
			function validateForm() {  
				var titleAdd = document.getElementById("title").value;
				var typeAdd = document.getElementById("type").value;
				var dateAdd = String(document.getElementById("date").value);
				
				var invalidMessages = "";
				if (titleAdd.length == 0 || typeAdd.length == 0) {
				    invalidMessages = "Please fill in blanks";
				} else {
					if (dateAdd == "") {
						invalidMessages = "Please select the Due Date.";
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
        <form action="processDatabaseAddTask.php" method="post">
            <p>
        		<strong>Title: </strong><input type="text" id="title" name="title" /><br /><br />
        		<strong>Type: </strong><input type="text" id="type" name="type" /><br /><br />
                <strong>Due Date: </strong><input type="date" id="date" name="dueDate" /><br /><br />
                <strong>Description: </strong><br /><br />
                <textarea rows="4" cols="50" placeholder="Optional" name="description"></textarea><br /><br />
        		<input type="submit" name="submitButton" onclick="return(validateForm())" value="Submit" />&nbsp;&nbsp;
        		<input type="submit" name="returnButton" value="Return to main menu" />
        	</p>
        </form>
EOBODY;
        $page = generatePage($body);
        echo $page;
?>