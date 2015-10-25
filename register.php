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
$title="Đăng ký";
$title2="Tài khoản";
$link2="#";
$description="Đăng ký tài khoản";
$keyword="đăng ký tài khoản,dang ky tai khoan,đăng ký,tài khoản,dang ky,tai khoan";
require_once("header.php");
echo "<center><p><h1>Đăng ký</h1></p></center>";
if ($_SESSION["userid"] == NULL)
{
echo "
<p class='message_blue'>Nếu đã có tài khoản, bạn có thể <a href='dang-nhap'>Đăng nhập!</a></p>
<p class='message_blue'>Bạn đã <a href='lay-lai-mat-khau'>Quên mật khẩu?</a></p>
<br/>
<center>
<form action='' method='post'>
<table border='0'>
<tr><td><p>Tài khoản</p></td><td><p><input name='username' type='text' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Mật khẩu</p></td><td><p><input name='password' type='password' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Nhập lại</p></td><td><p><input name='repassword' type='password' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Mật khẩu cấp 2</p></td><td><p><input name='pass2' type='password' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Email</p></td><td><p><input name='email' type='email' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Mã bảo vệ</p></td><td><p><input name='capt' type='text' value='' class='textbox' size='36' required/>&nbsp;<img src='capt.php'/><br/></p></td></tr>
<tr><td></td><td><p><input type='submit' name='register' value='Đăng ký' class='button' class='textbox'/></p></td></tr>
</table>
</form>
</center>
<br/>";
if(isset($_POST["register"]))
{
register();
}
}
else
{
echo "<p class='message_yellow'>Bạn đã có tài khoản rồi!</p>";
}
require_once("footer.php");
?>