<?php
require_once("../config.php");
require_once("../function.php");
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION["admin"] = $_COOKIE["admin"];
if ($_SESSION["admin"] != 1)
{
header("refresh: 0; url=/admin.php" );
}
require_once("header.php");
echo "<script>
document.getElementById('x2').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='basic.php'>Thiết lập cơ bản</a></li>
                    	<li><a href='admininfo.php'>Thông tin quản trị viên</a></li>
                    	<li><a href='social.php'>Mạng xã hội</a></li>
                    	<li><a href='ads.php'>Quảng cáo</a></li>
                    	<li><a href='sublist.php' class='active'>Đăng ký nhận đề mới</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Chỉnh sửa đăng ký</a></h2>
                <div id='main'>";
if(isset($_POST["editsub"]))
{
editsub();
}
				echo "<br/>";
if ($_GET['id'] != NULL)
{
$sql1="SELECT * FROM `subs` where `id`='".$_GET[id]."'";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{ 
		$row1=@mysql_fetch_array($query1);
		echo"
				<form action='' class='jNice' method='post'>
				<fieldset>
				<p><label>Email</label><input name='email' type='text' class='text-long' value='".$row1[email]."' required/></p>
				<input name='id' type='hidden' value='".$_GET[id]."' />
				<input name='editsub' type='submit' value='Chỉnh sửa' />
				</fieldset>
				</form>";
		}
		else { echo "Có lỗi"; }
} 
else { echo "Có lỗi"; }
require_once("footer.php");
?>