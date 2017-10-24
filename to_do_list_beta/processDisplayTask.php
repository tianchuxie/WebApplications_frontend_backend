<?php

    require_once("support.php");

        $body =<<< EOBODY
        <form action="processDatabaseDisplayTask.php" method="post">
			<p>
			    <strong>Please select Uncoming/Past tasks to display</strong><br /><br />
				<input type="radio" name="choice" value="Uncoming" checked="checked" />Uncoming Tasks&nbsp;
				<input type="radio" name="choice" value="Past" />Past Tasks&nbsp;

				<br /><br />
				<input type="submit" name="displayButton" value="Display Tasks" /><br /><br />
				<input type="submit" name="returnButton" value="Return to main menu" />
			</p>
		</form>
EOBODY;
                     
    $page = generatePage($body);
	echo $page;
?>