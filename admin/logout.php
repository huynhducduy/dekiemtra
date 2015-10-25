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
document.getElementById('x6').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='userlist.php' class='active'>Đăng xuất</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Đăng xuất</a></h2>
                <div id='main'>";
if(isset($_POST["logout_ad"]))
{
session_destroy();
setcookie("admin","",time()-1);
echo "<br/>Đăng xuất thành công!<br/>";
header("refresh: 2; url=../admin.php" );
}
				echo "<br/>
				<form action='' class='jNice' method='post'>
				<fieldset>
				<p>Bạn có chắc chắn muốn đăng xuất khỏi bảng điều khiển ban quản trị?</p>
				<input name='logout_ad' type='submit' value='Đăng xuất' />
				</fieldset>
				</form>";
require_once("footer.php");
?>