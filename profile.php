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
if ($_GET['id'] == NULL)
{
$_GET['id']=$_SESSION['userid'];
}
$id=$_GET['id'];
$sql="SELECT * FROM `users` where `id`='".$id."'";
$query=@mysql_query($sql);
if(@mysql_num_rows($query) == NULL)
	{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được thành viên!</p>";
	}
	else
	{
$title="Thông tin thành viên ".account($id,username);
$description="Thông tin về thành viên ".account($id,username);
$keyword="thông tin thành viên,thông tin,thành viên,thong tin thanh vien,thong tin,thanh vien,".account($id,username)."";
require_once("header.php");
	$x=$_SERVER['REQUEST_URI'];
	$kt="/thong-tin-thanh-vien-".strtolower(str_filter(account($id,username)))."-".$id."";
	if ($x != $kt) { header("refresh: 0; url=".$kt."" ); }
if (account($id,avatar) == NULL)
{
$ava="./images/noavatar.jpg";
}
else
{
$ava=account($id,avatar);
}
	echo "
<fieldset class='fieldset'>
<legend href='#'><a style='color: #fff;'>".account($id,username)."</i></a></legend>
<table border='0'>
<tr>
<td rowspan='8' style='padding-right: 6px;'><img class='img' src='./".$ava."' width='165px' height='165px'/></td>
</tr>
<tr>
<td><b>Tên :</b> ";
if (account($id,name) == NULL)
{
echo "Chưa biết";
}
else
{
echo account($id,name);
}
echo "</td>
</tr>
<tr>
<td><b>Ngày Sinh :</b> ";
if (account($id,birthday) == NULL)
{
echo "Chưa biết";
}
else
{
echo account($id,birthday);
}
echo "</td>
</tr>
<tr>
<td><b>Giới Tính :</b> ";
if (account($id,sex) == 1)
{
echo "Nam";
}
else if (account($id,sex) == 2)
{
echo "Nữ";
} 
else
{
echo "Chưa biết";
}
echo "</td>
</tr>
<tr>
<td><b>Địa Chỉ :</b> ";
if (account($id,address) == NULL)
{
echo "Chưa biết";
}
else
{
echo account($id,address);
}
echo "</td>
</tr>
<tr>
<td><b>Yahoo :</b> ";
if (account($id,yahoo) == NULL)
{
echo "Chưa biết";
}
else
{
echo account($id,yahoo);
}
echo "</td>
</tr>
<tr>
<td><b>Mail :</b> ".account($id,email)."</td>
</tr>
<tr>
<td><b>Điện Thoại :</b> ";
if (account($id,phone) == NULL)
{
echo "Chưa biết";
}
else
{
echo account($id,phone);
}
echo "</td>
</tr>
</table>
</fieldset>
<p style='float: left'><a href='danh-sach-de-da-dong-gop-cua-".strtolower(str_filter(account($id,username)))."-".$id."'>Danh sách đề đã đóng góp</a></p>
<p style='float: right'><a href='danh-sach-de-da-tai-cua-".strtolower(str_filter(account($id,username)))."-".$id."'>Danh sách đề đã tải</a></p>
<p style='float: none; text-align: center;'><a href='/danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($id,username)))."-".account($id,id)."'>Danh sách báo cáo làm thử đề kiểm tra</a></p>";
	}
require_once("footer.php");
?>