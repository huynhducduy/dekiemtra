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
                    	<li><a href='testlist.php' class='active'>Danh sách đề kiểm tra</a></li>
                    	<li><a href='posttest.php'>Đăng đề kiểm tra</a></li>
						<li><a href='testreport.php'>Báo cáo đề kiểm tra</a></li>
						<li><a href='testcontri.php'>Đóng góp đề kiểm tra</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Xóa đề kiểm tra</a></h2>
                <div id='main'>";
if(isset($_POST["deltest"]))
{
deltest();
}
				echo "<br/>";
if ($_GET['id'] != NULL)
{
$sql1="SELECT * FROM `tests` where `id`='".$_GET[id]."' and `rt`=1";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{ 
		$row1=@mysql_fetch_array($query1);
		echo"
				<form action='' class='jNice' method='post'>
				<fieldset>
				<p>Bạn có chắc chắn muốn xóa đề kiểm tra này?</p>
				<input name='id' type='hidden' value='".$_GET[id]."' />
				<input name='deltest' type='submit' value='Xóa' />
				</fieldset>
				</form>";
		}
		else { echo "Có lỗi"; }
} 
else { echo "Có lỗi"; }
require_once("footer.php");
?>