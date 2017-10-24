<?php
 require_once("support.php");
 session_start();
		$cousename = $_SESSION['courseinfo'] [0];
		$section = $_SESSION['courseinfo'] [1];
		
		$students = $_SESSION['studentinfo'];
	    $studentNumber = count($students);
		$stdgrades = $_SESSION['studentgrades'];
		
		$body = <<<DATA
                <form action="submit.php" method="post">
			<h1>Grade Submission Form</h1>
            <p>Course: $cousename, Section: $section</p>
				
			
                <table border = "1">
DATA;
        $grades = array ("A", "B","C","D","F");
                for ($i = 0; $i < $studentNumber; $i++){
				 $body .= <<<DATA
                      <tr>
                          <th>$students[$i]</th>
DATA;
			   for ($j = 0; $j < 5; $j++){
					if ($grades[$j] == $stdgrades[$i]){
					 $body .= <<<DATA
	   <td><input type="radio" name=$students[$i] value=$grades[$j] checked="checked">$grades[$j]</td>
DATA;
					} else {
					 $body .= <<<DATA
					 <td> <input type="radio" name=$students[$i] value=$grades[$j]>$grades[$j]</td>
DATA;
					}
				   }
				    $body .= <<<DATA
					</tr>
DATA;
	
				}
				
                $body .= <<<DATA
                </table>
				<!--We need the submit button-->
				<p>
					<input type="submit" value="Continue" />
				</p>
			</form>
DATA;
        
          
    
			$page = generatePage($body, "Grades Submission System");
            echo $page;
    
?>