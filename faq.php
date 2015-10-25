<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); 
require_once("config.php");
require_once("function.php");
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_COOKIE["cookid"]))
{
$_SESSION["userid"] = $_COOKIE["cookid"];
}
$title="Trợ giúp";
$description="Trợ giúp";
$keyword="trợ giúp,tro giup";
require_once("header.php");
echo "<center><p><h1>Trợ giúp</h1></p></center>
- Blah blah blah....<br/>
- Blah blah blah blah...
";
require_once("footer.php");
?>