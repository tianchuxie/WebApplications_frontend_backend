<?php
    function generatePage($body, $scriptSrc = "", $scriptBody = "") {
        $page = <<<EOPAGE
        <!doctype html>
        <html>    
            <head> 
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>ToDoList System</title>
                <link rel="stylesheet" type="text/css" href="css/main.css" />
                $scriptSrc
            </head>        
            <body>
                $body
                
                $scriptBody
            </body>
        </html>
EOPAGE;
    return $page;
    }
?>