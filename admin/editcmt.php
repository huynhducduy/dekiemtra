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
document.getElementById('x8').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='cmtlist.php'>Danh sách bình luận</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Chỉnh sửa bình luận</a></h2>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
						<table cellpadding='0' cellspacing='0' style='width: 100%'>
						";
if (isset($_POST[editcmt]))
{
editcmt();
}
if (isset($_GET[id]))
{
$sqlcmt="SELECT * FROM `comments` where `id`='".$_GET['id']."'";
$querycmt=@mysql_query($sqlcmt);
if (@mysql_num_rows($querycmt) != 0)
	{
	$rowcmt=@mysql_fetch_array($querycmt);
	echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/><fieldset>
				<p><label>Bình luận</label>
				<textarea name='content' class='ckeditor'>".$rowcmt[content]."</textarea></p>
				<p><label>Số like</label>
				<input name='liked' class='text-long' type='text' value='".$rowcmt[liked]."'></p>
				<p><label>ID người like</label>
				<input name='uid_liked' class='text-long' type='text' value='".$rowcmt[uid_liked]."'></p>
		</fieldset>";
	echo "<input name='editcmt' type='submit' value='Chỉnh sửa bình luận' /><br/><br/><br/>";
	}
	else {
	echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<Br/>Có lỗi
				</form>";
}
}
else
{
echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<Br/>Có lỗi
				</form>";
}
echo "<br/><br/>";
require_once("footer.php");
?>