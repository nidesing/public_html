<?php
if ($_POST["logingomb"]==1)
{
	session_start();
	
	$_SESSION['username'] = NULL;
	unset( $_SESSION['username'] );
	
	session_destroy(); 
} 
?>
<!doctype html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	
	<title>Facebook quiz demo admin page</title>
	
<style type="text/css">

	*					{ margin: 0; padding: 0; }
body				{ font-family: Georgia, serif; background: url(images/login-page-bg.jpg) top center no-repeat #c4c4c4; color: #3a3a3a;  }

.clear				{ clear: both; }

form				{ width: 406px; margin: 161px auto 0; }

legend				{ display: none; }

fieldset			{ border: 0; }

label				{ width: 115px; text-align: right; float: left; margin: 0 10px 0 0; padding: 9px 0 0 0; font-size: 16px; }

input				{ width: 220px; display: block; padding: 4px; margin: 0 0 10px 0; font-size: 18px;
					  color: #3a3a3a; font-family: Georgia, serif;}
input[type=checkbox]{ width: 20px; margin: 0; display: inline-block; }
					  
.button				{ background: url(images/button-bg.png) repeat-x top center; border: 1px solid #999;
					  -moz-border-radius: 5px; padding: 5px; color: black; font-weight: bold;
					  -webkit-border-radius: 5px; font-size: 13px;  width: 70px; }
.button:hover		{ background: white; color: black; }
</style>

	
</head>
<body id="login">
		<header>
		<div>
		</div>	
		</header>
		<section>
		<form id="login-form"  method="POST"  enctype="multipart/form-data" action="checklogin.php">
			<fieldset>

				<section><label for="username">Username</label>
					<div><input type="text" id="username" name="username" autofocus></div>
				</section>
				<section><label for="username">Password</label>
					<div><input type="password" id="password" name="password"></div>
				</section>
				<section>
<div class="clear"></div>
			
			<br />
			
			<input type="submit" style="margin: -20px 0 0 287px;" class="button" name="logingomb" value="Log in"/>					</section>
										

			</fieldset>
		</form>
		</section>	
		
</body>
</html>