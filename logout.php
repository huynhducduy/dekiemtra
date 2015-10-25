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
$title="Đăng xuất";
$title2="Tài khoản";
$link2="#";
$description="Đăng xuất khỏi tài khoản";
$keyword="đăng xuất khỏi tài khoản,dang xuat khoi tai khoan,đăng xuất,tài khoản,dang xuat,tai khoan";
require_once("header.php");
echo "<center><p><h1>Đăng Xuất</h1></p></center>";
if ($_SESSION["userid"] == NULL)
{
echo "
<p class='message_red'>Bạn chưa đăng nhập! Không thể đăng xuất!</p>";
}
else
{
logout();
}
require_once("footer.php");
?>