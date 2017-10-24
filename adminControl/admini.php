<?php
 require_once("support.php");
 $body =<<< DATA
 <h2><u>After selecting OK</u></h2>
 <h1>Applications</h1>
 <form action="afteradmini.php" method="post">
    <p>
       select fields to display<br/>
        <select name="fields[]" multiple="multiple">
          <option value = "name"> name </option>
          <option value = "email"> email </option>
          <option value = "gpa"> gpa </option>
          <option value = "year"> year </option>
          <option value = "gender" required = "required"> gender </option>
        </select>
    </p>
    
    <p>
       select fields to sort application
        <select name="sort">
          <option value = "name"> name </option>
          <option value = "email"> email </option>
          <option value = "gpa"> gpa </option>
          <option value = "year"> year </option>
          <option value = "gender" required = "required"> gender </option>
        </select>
    </p>
    
    <p>
       Filter Condition:<input type="text" name="filter" Required="True"/>
    </p>
        
    <p>
      <input type="submit" value="Submit Data" />
    </p>
 </form>
DATA;
$body .= <<< DATA
     <form action="main.html" method="post">
        <input type="submit" name="return" value = "Return to main menu"/>
     </form>
DATA;
	echo generatePage($body);
?>