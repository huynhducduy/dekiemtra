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
                    	<li><a href='basic.php' class='active'>Thiết lập cơ bản</a></li>
                    	<li><a href='admininfo.php'>Thông tin quản trị viên</a></li>
                    	<li><a href='social.php'>Mạng xã hội</a></li>
                    	<li><a href='ads.php'>Quảng cáo</a></li>
                    	<li><a href='sublist.php'>Đăng ký nhận đề mới</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Thiết lập cơ bản</a></h2>
                <div id='main'>";
if(isset($_POST["basic"]))
{
basic();
}
				echo "
				<br/>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
                    	<fieldset>
                        	<p><label>Tiêu đề</label><input name='title' type='text' class='text-long' value='".settings("title")."' required/></p>
							<p><label>Logo</label><img src='".settings("logo")."' style='margin-bottom: 6px'><br/><input type='file' name='file' id='file'/></p>
							<p><label>Mô tả</label><input name='description' type='text' class='text-long' value='".settings("description")."' required/></p>
							<p><label>Từ khóa</label><input name='keyword' type='text' class='text-long' value='".settings("keyword")."' required/></p>
							<p><label>Người sáng lập</label><input name='author' type='text' class='text-long' value='".settings("author")."' required/></p>
							<p><label>Đường dẫn</label><input name='url' type='text' class='text-long' value='".settings("url")."' required/></p>
							<p><label>Tên miền</label><input name='domain' type='text' class='text-long' value='".settings("domain")."' required/></p>
							<p><label>Giới thiệu</label><textarea name='intro' type='text' class='ckeditor'>".settings("intro")."</textarea></p>
                            <input name='basic' type='submit' value='Chỉnh sửa' />
                        </fieldset>
                    </form>";
require_once("footer.php");
?>