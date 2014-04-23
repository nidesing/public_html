<?php
session_start();
error_reporting(0);

/*
Created by Victor Arthur
Website: http://victorarthur.com
Email: hello@victorarthur.com
Version: 1.1
*/

if( !isset($_SESSION['username']))
{
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=login.php" />';
}

?>
<!doctype html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	
	<title>Facebook quiz demo admin page</title>
	
	<meta name="author" content="awtheme" />
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/default.css" class="theme"/>
	
    <?php
	function curPageName() {
 		return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
	if( (curPageName()!="texts.php") and (curPageName()!="form.php") and (curPageName()!="settings.php") ){
		echo '<script src="js/wl_Form.js"></script>';
	}
	
	function rn_replace($stringtoreplace){
		$donestring = str_replace("\\r\\n","\n",$stringtoreplace);
		return $donestring;
		}
	
	?>
	
</head>
<body>