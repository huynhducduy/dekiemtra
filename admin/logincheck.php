<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
sleep(2);
$UserName 	  = $_POST["txtUser"];
$Password 	  = $_POST["HiddenPass"];
$chkRemember  = $_POST["txtRememberMe"];
$CurrentColor = $_POST["txtCurrentColor"];
$CurrentBack  = $_POST["txtCurrentBack"];
$Valid = 0;
$UserName = strtolower($UserName);
$Password = md5(strtolower($Password));
if ($UserName == "admin" && $Password == "42c6199c327263c84b74c1c4d832f193") 
{
	$Valid = 1;
	$_SESSION["admin"] = 1;
			if (isset($_POST["chkRemember"])) 
		{ 
				setcookie("admin", 1, time()+60*60*24*7);
		} 
}
echo $Valid;
?>