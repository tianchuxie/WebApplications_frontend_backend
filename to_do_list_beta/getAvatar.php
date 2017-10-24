<?php
    require_once("databaseClass.php");
    
    $fileToRetrieve = $_GET["fileToRetrieve"];	
    
    $new_db = new databaseMysql("localhost", "dbuser", "goodbyeWorld", "applicationdb", "logInInfo");
    $sqlQuery = "select * from $new_db->table where username = '{$fileToRetrieve}'";

    $result = $new_db->db->query($sqlQuery);
    
    if ($result) {
		$recordArray = mysqli_fetch_assoc($result);
		header("Content-type: image/jpeg");
		echo $recordArray['docData'];
		mysqli_free_result($result);
	}
    $result->close();
       
?>