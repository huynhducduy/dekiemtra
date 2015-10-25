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
$title="Giới thiệu";
$description="Giới thiệu về thư viện đề kiểm tra";
$keyword="giới thiệu, gioi thieu";
require_once("header.php");
echo "<center><p><h1>Giới thiệu</h1></p></center>";
echo "<p>".settings("intro")."</p>";
require_once("footer.php");
?>