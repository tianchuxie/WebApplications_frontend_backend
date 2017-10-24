<?php
if (!isset($_GET['filename']))
	print("Invalid filename provided");
else {
 	$filename = $_GET['filename'];
 	$fp = fopen($filename, "r") or die("Failed to open file: ".$filename);
	printf("<b>Displaying file</b> %s", $_GET['filename']);
	print("<pre>");
	$bytesToReadIfNoNewline = 1024;
	while (!feof($fp)) {
		$line = fgets($fp, $bytesToReadIfNoNewline);
		echo $line;
	}
	print("</pre>");
}
?>