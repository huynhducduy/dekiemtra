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
document.getElementById('x3').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='categorylist.php' class='active'>Cây danh mục</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Xóa danh mục</a></h2>
                <div id='main'>
				<br/>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>";
// Nếu lấy cate1 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cg1']) && (INT)($_GET['cg1'])) 
{
}
// Nếu lấy cate2 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (isset($_GET['cg2']) && (INT)($_GET['cg2'])) 
{
}
// Nếu lấy cate3 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (isset($_GET['cg3']) && (INT)($_GET['cg3'])) 
{
}
else
{
echo "Có lỗi";
}
					echo "Chức năng chưa hoàn thiện</form>
					<br/>";
if(isset($_POST["delcate"]))
{
delcate();
}
require_once("footer.php");
?>