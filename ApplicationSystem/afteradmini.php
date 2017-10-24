<?php
require_once("support.php");
Class friend{
    public $name;
    public $email;
    public $gpa;
    public $year;
    public $gender;
}

$fields = $_POST['fields'];

$fsort = $_POST['sort'];

$filter = $_POST['filter'];

$body =<<< DATA
    <h2><u>After selecting "Display Applications"</u></h2>
    <h1>Applications</h1>
DATA;

	$host = "localhost";
	$user = "dbuser";
	$password = "goodbyeWorld";
	$database = "applicationdb";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
	
	$sqlQuery = sprintf("select * from %s where %s order by %s", $table, $filter, $fsort);
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$numberOfRows = mysqli_num_rows($result);
 	 	if ($numberOfRows == 0) {
			$body = "<h1>No entries exists in the table</h1>";
		} else {
            $count = 0;
			while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $friends[$count] = new friend();
                $friends[$count]->name = $recordArray['name'];
		     	$friends[$count]->email = $recordArray['email'];
                $friends[$count]->gpa = $recordArray['gpa'];
                $friends[$count]->year = $recordArray['year'];
                $friends[$count]->password = $recordArray['password'];
                $friends[$count]->gender = $recordArray['gender'];
                $count++;
			
     		}
            
            
		}
		mysqli_free_result($result);
	}  else {
		$body = "Retrieving records failed.".mysqli_error($db);
	}
	
    $body .=<<< DATA
      <table border = "1">
      <tr>
DATA;
    foreach ($fields as $f){
        $body .=<<< DATA
        <th>$f</th>
DATA;
    }
    $body .="</tr>";
    for ($i = 0; $i < $count; $i++){
        $body .= "<tr>";
        foreach($fields as $f){
            $body.= "<td>";
            $body.= $friends[$i]->$f;
            $body.="</td>";
        }
        $body .="</tr>";
    }
    $body .= "</table> <br/>";
	/* Closing */
	mysqli_close($db);
    $body .= <<< DATA
     <form action="main.html" method="post">
        <input type="submit" name="return" value = "Return to main menu"/>
     </form>
DATA;
	
	echo generatePage($body);

function connectToDB($host, $user, $password, $database) {
	$db = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Connect failed.\n".mysqli_connect_error();
		exit();
	}
	return $db;
}

?>