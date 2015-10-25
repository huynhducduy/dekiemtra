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
                    	<li><a href='social.php' class='active'>Mạng xã hội</a></li>
                    	<li><a href='ads.php'>Quảng cáo</a></li>
                    	<li><a href='sublist.php'>Đăng ký nhận đề mới</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Mạng xã hội</a></h2>
                <div id='main'>";
				if(isset($_POST["social"]))
{
social();
}
				echo "
				<br/>
				<form action='' class='jNice' method='post'>
                    	<fieldset>
                        	<p><label>Admin FBID</label><input name='adfbid' type='text' class='text-long' value='".settings("fb_id_admin")."' required/></p>
							<p><label>Mod FBID</label><input name='modfbid' type='text' class='text-long' value='".settings("fb_id_mod")."' required/></p>
							<p><label>App FBID</label><input name='appfbid' type='text' class='text-long' value='".settings("fb_id_app")."' required/></p>
							<p><label>Page FBID</label><input name='pagefbid' type='text' class='text-long' value='".settings("fb_id_page")."' required/></p>
							<p><label>Google Custom Search Engine ID</label><input name='gcseid' type='text' class='text-long' value='".settings("gcseid")."' required/></p>
                            <input name='social' type='submit' value='Chỉnh sửa' />
                        </fieldset>
                    </form>";
require_once("footer.php");
?>