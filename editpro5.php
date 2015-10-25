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
$title="Thay đổi thông tin thành viên";
$description="Thay đổi thông tin thành viên";
$keyword="thay đổi thông tin thành viên,thay đổi thông tin,thông tin thành viên,thay đổi,thông tin,thành viên,thay doi thong tin thanh vien,thay doi thong tin,thong tin thanh vien,thay doi,thong tin,thanh vien";
require_once("header.php");
echo "<center><p><h1>Thay đổi thông tin thành viên</h1></p></center>";
if ($_SESSION['userid'] != NULL)
{
$sql="SELECT * FROM `users` where `id`='".$id."'";
$query=@mysql_query($sql);
if (logging_account(avatar) == NULL)
{
$ava="./images/noavatar.jpg";
}
else
{
$ava=logging_account(avatar);
}
	echo "
<table border='0' style='margin-top: 5px;'>
<tr>
<td rowspan='2' style='padding-right: 10px;'>
<img class='img' src='../".$ava."' width='165px' height='165px'/><br/>
</td>
</tr>
<tr>
<td>
<form action='' method='post' enctype='multipart/form-data'>
<input type='file' name='file' id='file' />
</td>
</tr>
</table>
<table>
<tr>
<td><p>Tên</p></td><td><input name='name' type='text' value='".logging_account(name)."' class='textbox' size='40' required/></td>
</tr>
<tr>
<td><p>Ngày Sinh</p></td><td><input name='birthday' type='text' value='".logging_account(birthday)."' class='textbox' size='40' required/></td>
</tr>
<tr>
<td><p>Giới Tính</p></td><td><input name='sex' type='radio' value='1'";
if (logging_account(sex) == 1)
{
echo " checked > Nam <input name='sex' type='radio' value='2'";
}
else if (logging_account(sex) == 2)
{
echo "> Nam <input name='sex' type='radio' value='1' checked";
}
else
{
echo "> Nam <input name='sex' type='radio' value='1'";
}
echo "> Nữ</td>
</tr>
<tr>
<td><p>Địa Chỉ</p></td><td><input name='address' type='text' value='".logging_account(address)."' class='textbox' size='40' required/></td>
</tr>
<tr>
<td><p>Yahoo</p></td><td><input name='yahoo' type='text' value='".logging_account(yahoo)."' class='textbox' size='40' required/></td>
</tr>
<tr>
<td><p>Email</p></td><td><input name='email' type='text' value='".logging_account(email)."' class='textbox' size='40' required/></td>
</tr>
<tr>
<td><p>Điện Thoại</p></td><td><input name='phone' type='text' value='".logging_account(phone)."' class='textbox' size='40' required/></td>
</tr>
<tr>
<td><p>Mật khẩu</p></td><td><p><input name='password' type='password' value='' class='textbox' size='40' required/><br/></p></td>
</tr>
<tr>
<td><p>Mã bảo vệ</p></td><td><p><input name='capt' type='text' value='' class='textbox' size='30' required/>&nbsp;<img src='capt.php'/><br/></p></td>
</tr>
</table>
<span style='float: right;'>
<input type='submit' name='edit' value='Chỉnh Sửa' class='button'/>
</form>
</span><br/><br/><br/>";
if(isset($_POST["edit"]))
{
edit_profile();
}
}
else
{
echo "<p class='message_yellow'>Bạn chưa đăng nhập, không thể thay đổi thông tin!</p>";
}
require_once("footer.php");
?>