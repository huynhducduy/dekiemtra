<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); 
require_once("../config.php");
require_once("../function.php");
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION["admin"] = $_COOKIE["admin"];
if ($_SESSION["admin"] == 1)
{
header("refresh: 0; url=/admin/index2.php" );
}
?>
<html>
<head>
<title>Bảng điều khiển quản trị - <?php echo settings(description); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 ">
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600&subset=latin,latin-ext,vietnamese' rel='stylesheet' type='text/css'> -->
<style>
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../font/OpenSans.woff) format('woff');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(../font/OpenSans-Light.woff) format('woff');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  src: local('Open Sans Semibold'), local('OpenSans-Semibold'), url(../font/OpenSans-Semibold.woff) format('woff');
}
</style>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
<img src="img/gear.png" id="OptionColor">
<img src="img/picture.png" id="OptionBack">
	<!-- Login Box -->
	<div class="LoginBox">
		<!-- live avatar -->
		<img src="img/avatar.png">
		<!-- Login Message -->
		<h2 class="loginMessage"></h2>
		<!-- Form Fields -->
		 <div class="fields">
			<form id="frmLogin">
				<input type="text" id="txtUser" name="txtUser" placeholder="Username"/>
				<p></p>
				<input type="password" id="txtPassword" name="txtPassword" placeholder="Password"/>
				<!-- buttons eye and  -->
				<button id="botLogIn"></button>
				<img src="img/eye.png" class="seePass">
			</form>
		</div>
	</div>
<script type="text/javascript" src="js/MetroLogin.js"></script>
</body>
</html>