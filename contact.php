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
$title="Liên hệ";
$description="Liên hệ với ban quan trị thư viện đề kiểm tra";
$keyword="Liên hệ,lien he";
require_once("header.php");
echo "<center><p><h1>Liên hệ</h1></p></center>";
echo "<ul><p><br/><b>Bạn có thể liên hệ với chúng tôi qua:</b><br/>
<li>- Email: <a href='mailto:".settings("admin_mail")."'>".settings("admin_mail")."</a><Br/>
<li>- Facebook: <a href='".settings("admin_fb")."' target='_blank'>".settings("author")."</a><br/>
<li>- Số điện thoại: <a>".settings("admin_phone")."</a><Br/>
<li>- Yahoo Messenger: <a href='ymsgr:sendIM?".settings("admin_yahoo")."'>".settings("admin_yahoo")."</a><br/>
</p></ul>
<p><b>Hoặc điền vào mẫu thông tin dưới đây:</b>
<center>
<form action='' method='post'>
<table>
<tr><td><p>Họ và tên</p></td><td><p><input name='name' type='text' value='' class='textbox' size='40' required/><br/></p></td></tr>
<tr><td><p>Email</p></td><td><p><input name='email' type='email' value='' class='textbox' size='40' required/><br/></p></td></tr>
<tr><td><p>Thông điệp</p></td><td><p><textarea name='mess' type='text' class='textbox' cols='70' rows='10' required/></textarea><br/></p></td></tr>
<tr><td></td><td><p><input type='submit' name='send' class='button' value='Gửi'/><br/></p></td></tr>
</table>
</form>
</center>
</p>
<br/>";
if(isset($_POST["send"]))
{
contact();
}
require_once("footer.php");
?>