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
$title="Đổi mật khẩu";
$title2="Tài khoản";
$link2="#";
$description="Đổi mật khẩu";
$keyword="đổi mật khẩu,doi mat khau,đổi mật khẩu tài khoản,doi mat khau tai khoan,tài khoản,tai khoan";
require_once("header.php");
echo "<center><p><h1>Đổi mật khẩu</h1></p></center>";
echo "
<p class='message_blue'>Nếu quên mật khẩu cấp 2, bạn có thể <a href='doi-mat-khau'>Đổi mật khẩu bằng mật khẩu cũ!</a></p>
<br/>
<center>
<form action='' method='post'>
<table>
<tr><td><p>Tài khoản</p></td><td><p><input name='username' type='text' value='".logging_account(username)."' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Mật khẩu cấp 2</p></td><td><p><input name='password2' type='password' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Mật khẩu mới</p></td><td><p><input name='password' type='password' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Nhập lại</p></td><td><p><input name='repassword' type='password' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Mã bảo vệ</p></td><td><p><input name='capt' type='text' value='' class='textbox' size='36' required/>&nbsp;<img src='capt.php'/><br/></p></td></tr>
<tr><td></td><td><p><input type='submit' name='change_pass' class='button' value='Lấy lại mật khẩu'/><br/></p></td></tr>
</table>
</form>
</center>
<br/>";
if(isset($_POST["change_pass"]))
{
change_pass2();
}
require_once("footer.php");
?>