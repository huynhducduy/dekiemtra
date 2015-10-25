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
document.getElementById('x4').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='cmtlist.php'>Danh sách bình luận</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Xóa bình luận</a></h2>
                <div id='main'>";
if(isset($_POST["delcmt"]))
{
delcmt();
}
				echo "<br/>";
if ($_GET['id'] != NULL)
{
$sqlcmt="SELECT * FROM `comments` where `id`='".$_GET['id']."'";
$querycmt=@mysql_query($sqlcmt);
if (@mysql_num_rows($querycmt) != 0)
		{ 
		echo"
				<form action='' class='jNice' method='post'>
				<fieldset>
				<p>Bạn có chắc chắn muốn xóa bình luận này?</p>
				<input name='id' type='hidden' value='".$_GET[id]."' />
				<input name='delcmt' type='submit' value='Xóa' />
				</fieldset>
				</form>";
		}
		else { echo "Có lỗi"; }
} 
else { echo "Có lỗi"; }
require_once("footer.php");
?>