<?php
 require_once("support.php");

$cousename = $_POST["coursename"];
		$section = $_POST["section"];
		$filename = $cousename.$section.".txt";
		if (!file_exists($filename)) {
			$body = "<strong>File {$filename} does not exist.</strong>";
		} else {	
			$fp = fopen($filename, "r") or die("Could not open file");
			$studentNumber = 0;
			while (!feof($fp)) {
				$line = fgets($fp);
				$line = ltrim($line);
				if ($line != ""){
					$students[$studentNumber] = $line;
					$studentNumber++;
			
					
			}
			
            }
			session_start();
			$_SESSION ["courseinfo"] = array ($cousename, $section);
			$_SESSION["studentinfo"] = $students;
		
		   
        
                $body = <<<DATA
                <form action="submit.php" method="post">
			<h1>Grade Submission Form</h1>
            <p>Course: $cousename, Section: $section</p>
				
			
                <table border = "1">
DATA;
              
              
                

                for ($i = 0; $i < $studentNumber; $i++){
                    $body .= <<<DATA
                      <tr>
                          <th>{$students[$i]}</th>
                          <td> <input type="radio" name=$students[$i] value="A">A</td>
                          <td> <input type="radio" name=$students[$i] value="B">B</td>
                          <td> <input type="radio" name=$students[$i] value="C">C</td>
                          <td> <input type="radio" name=$students[$i] value="D">D</td>
                          <td> <input type="radio" name=$students[$i] value="F" required = "true">F</td>
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
        
            }
    
			$page = generatePage($body, "Grades Submission System");
            echo $page;
			fclose($fp);
    
?>