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
                    	<li><a href='admininfo.php' class='active'>Thông tin quản trị viên</a></li>
                    	<li><a href='social.php'>Mạng xã hội</a></li>
                    	<li><a href='ads.php'>Quảng cáo</a></li>
                    	<li><a href='sublist.php'>Đăng ký nhận đề mới</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Thông tin quản trị viên</a></h2>
                <div id='main'>
				";
				if(isset($_POST["admininfo"]))
{
admininfo();
}
				echo "
				<br/>
				<form action='' class='jNice' method='post'>
                    	<fieldset>
                        	<p><label>Địa chỉ email</label><input name='email' type='text' class='text-long' value='".settings("admin_mail")."' required/></p>
							<p><label>Số điện thoại</label><input name='phone' type='text' class='text-long' value='".settings("admin_phone")."' required/></p>
							<p><label>Facebook</label><input name='fb' type='text' class='text-long' value='".settings("admin_fb")."' required/></p>
							<p><label>Yahoo</label><input name='yahoo' type='text' class='text-long' value='".settings("admin_yahoo")."' required/></p>
                            <input name='admininfo' type='submit' value='Chỉnh sửa' />
                        </fieldset>
                    </form>";
require_once("footer.php");
?>