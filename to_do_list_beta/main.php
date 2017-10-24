<!doctype html>

<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>ToDoList System</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script src="displayRealtime.js"></script>
    </head>
	
	<body onload="displayTime()">
		<div id="fb-root"></div>
			<script>
				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
			<script>
				! function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0],
					p = /^http:/.test(d.location) ? 'http' : 'https';
					if (!d.getElementById(id)) {
						js = d.createElement(s);
						js.id = id;
						js.src = p + '://platform.twitter.com/widgets.js';
						fjs.parentNode.insertBefore(js, fjs);
					}
				}(document, 'script', 'twitter-wjs');
			</script>
		<div>
			<header id="header" class="clear"> 
				<div id="logo">
					<h1>ToDoList System</h1>
				</div>  
			</header>
		</div>
		<form action="processSignInRequest.php" method="post">
            <p>&nbsp;&nbsp;<img src="umdLogo.gif" /></p>
            <p><hr /></p>
			<p>
				&nbsp;<img src="testudo.jpg" /><br /><br />
                <strong><font size="6">&nbsp;Welcome to ToDoList System</font></strong> 
			</p>
			
			<p>
				<br />&nbsp;&nbsp;&nbsp;<input type="submit" name="loginButton" value="Log In" />
					  &nbsp;&nbsp;&nbsp;<input type="submit" name="signUpButton" value="Sign Up" />
			</p>
			
			&nbsp;&nbsp;Curren time: <strong id="date"></strong>
			
			<hr />

			<div class="fb-like" data-href="https://www.facebook.com/UnivofMaryland" data-width="30" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
			<div><br /><a href="https://twitter.com/UofMaryland" class="twitter-follow-button" data-show-count="false">Follow @UofMaryland</a></div>
			<p id="contact">If you have any questions about our program, please contact the system administrator at <a href="mailto:wall0313@gmail.com">wall0313@gmail.com</a></p>
			
		</form>
	</body>
</html>