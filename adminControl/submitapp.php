<?php
$scriptName = "aftersubmit.php";
include "support.php";
$body = <<< DATA
    <form action="$scriptName" method="post">
        <h2><u>After selecting "Submit Application" and providing some information</u></h2>
        <p>
			Name:<input type="text" name="name" required = "true"/>
		</p>
        
        <p>
			Email:<input type="text" name="email" required = "true"/>
		</p>
        
        <p>
			GPA:<input type="text" name="gpa" required = "true"/>
		</p>
        
        <p>
				Year:
				<input type="radio" name="year" value="10">10
				<input type="radio" name="year" value="10">11
				<input type="radio" name="year" value="10" required = "true">12
		
		</p>
        
        <p>
			Gender:
                <input type="radio" name="gender" value="M">M
				<input type="radio" name="gender" value="F" required = "true">F
		</p>
        
        <p>
			Password:<input type="password" name="password" required = "true"/>
		</p>
        
        <p>
			Verify Password:<input type="password" name="rpassword" required = "true"/>
		</p>
        
        <p>
            <input type="submit" name="submitInfoButton" />
        </p>
        <p>
			<input type="submit" name="return" value = "Return to main menu"/>
		</p>
    </form>
DATA;
echo generatePage($body, "Grades Submission System");
?>

