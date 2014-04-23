<?php
error_reporting(0);
//session_start();

$username=$_POST["username"];
$password=$_POST["password"];


require_once("../config.inc.php");
require_once("../MODULES/Database.class.php");


$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect();
@mysql_query("SET NAMES utf8");


// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);


$login_sql="SELECT * FROM `Admin` WHERE `admin_user` ='$username' AND `admin_pass` = '".md5($password."tambourine")."'";

$result=mysql_query($login_sql);
$count=mysql_num_rows($result);

if($count==1)
{
        session_start ();
        
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        //echo $_SESSION['username'];
        echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';

}
else 
{

        //$status_sql = "insert into `Admin` (`admin_user`, `admin_pass`) values ( '$username', '".md5($password."tambourine")."')";
         //mysql_query($status_sql);
        echo "Bad username or password";
        echo '<meta HTTP-EQUIV="REFRESH" content="2; url=login.php">';

}
?>