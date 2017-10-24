<?php

	require_once("support.php");
	require_once("databaseClass.php");
	$scriptName = $_SERVER["PHP_SELF"];
	$jQuery = "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js\"></script>";
	session_start();
	
    if (isset($_POST["returnButton"])) {
        header("Location: function.php");
    }
	
    
    if (isset($_POST["displayButton"])) {
		$new_db = new databaseMysql("localhost", "dbuser", "goodbyeWorld", "applicationdb", "tasks");
	   
		$displayChoice = $_POST["choice"];
		$currentDate = (string)date("Y-m-d");
		$username = $_SESSION['username'];
		
        if ($displayChoice == "Uncoming") {
			$query = "select * from $new_db->table where username='$username' and date >= '$currentDate' order by date";
		} else {
			$query = "select * from $new_db->table where username='$username' and date < '$currentDate' order by date";
		}
		        
        $result = $new_db->db->query($query);
        
        if (!$result) {
            echo "No tasks exists in the database.";
			$body1 =<<< EOBODY
				<form action="$scriptName" method="post">
					<p>
						<input type="submit" name="returnButton" value="Return to main menu" />
					</p>
				</form>		
EOBODY;
				$page = generatePage($body1);
				echo $page;
			die();
        }
		if ($result->num_rows == 0) {
			echo "No tasks exists in the database.";
			$body1 =<<< EOBODY
				<form action="$scriptName" method="post">
					<p>
						<input type="submit" name="returnButton" value="Return to main menu" />
					</p>
				</form>		
EOBODY;
				$page = generatePage($body1);
				echo $page;
		} else {
			
			$body =<<< EOBODY
				<form action="$scriptName" method="post">
					<h1>$displayChoice Tasks</h1>
					<table border = "0" id="tableTask">
EOBODY;
			for ($rowIndex = 0; $rowIndex < $result->num_rows; $rowIndex++) {
				$result->data_seek($rowIndex);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				
				/* Modified for description on hover */
				$body .=<<< EOBODY
					<tr>
						<td class="taskItem taskFirst">{$row['date']}</td>
						<td class="taskItem">{$row['type']}</td>
						<td class="taskItem">{$row['title']}
							<span class="taskSpan">{$row['content']}</span>
						</td>
					</tr>
					
EOBODY;
			$jQueryScript =<<< EOBODY
				<script>
					$(document).ready(procMain);
					
					function procMain() {
						$("td.taskItem").mouseover(taskHover);
						$("td.taskItem").mouseleave(taskRevert);
					}
					
					function taskHover(event) {
						$(this).addClass("taskItemHover");
					}
					
					function taskRevert(event) {
						$(this).removeClass("taskItemHover");
					}
				</script>
EOBODY;
			}
			$body .=<<< EOBODY
					</table>
					<br /><br /><br /><br /><br /><br />
					<p>
						<input type="submit" name="returnButton" value="Return to main menu" />
					</p>
				</form>		
EOBODY;
				$page = generatePage($body, $jQuery, $jQueryScript);
				echo $page;
		}
		$result->close();
	}
        
?>