<?php

function generatePage($body, $title="Example") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>Application System</title>	
	</head>
	
	<style type="text/css">

h2 {
	color: red;

}
</style>
            
    <body>
            $body
    </body>
</html>
EOPAGE;

    return $page;
}
?>