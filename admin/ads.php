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
                    	<li><a href='ads.php' class='active'>Quảng cáo</a></li>
                    	<li><a href='sublist.php'>Đăng ký nhận đề mới</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Quảng cáo</a></h2>
                <div id='main'>";
				if(isset($_POST["ads"]))
{
ads();
}
				echo "
				<br/>
				<form action='' class='jNice' method='post'>
                    	<fieldset>
							<p><label>Quảng cáo 1</label><input name='qc1' type='text' class='text-long' value='".settings("ads_1")."' required/></p>
							<p><label>Quảng cáo 2</label><input name='qc2' type='text' class='text-long' value='".settings("ads_2")."' required/></p>
							<p><label>Quảng cáo 3</label><input name='qc3' type='text' class='text-long' value='".settings("ads_3")."' required/></p>
							<p><label>Quảng cáo 4</label><input name='qc4' type='text' class='text-long' value='".settings("ads_4")."' required/></p>
							<p><label>Quảng cáo 5</label><input name='qc5' type='text' class='text-long' value='".settings("ads_5")."' required/></p>
                            <input name='ads' type='submit' value='Chỉnh sửa' />
                        </fieldset>
                    </form>";
require_once("footer.php");
?>