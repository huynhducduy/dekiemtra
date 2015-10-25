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
document.getElementById('x5').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='userlist.php' class='active'>Danh sách thành viên</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Chỉnh sửa thành viên</a></h2>
                <div id='main'>";
				if(isset($_POST["edituser"]))
{
edituser();
}
				echo "
				<br/>";
if ($_GET['id'] != NULL)
{
$sql1="SELECT * FROM `users` where `id`='".$_GET[id]."'";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{
		$row1=@mysql_fetch_array($query1);
		if ($row1[avatar] == NULL)
{
$ava="../images/noavatar.jpg";
}
else
{
$ava=$row1[avatar];
}
				echo "
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
						<fieldset>
							<p><label>Ảnh đại diện</label><img src='".$ava."' width='200px' height='200px'  style='margin-bottom: 6px'><br/><input type='file' name='file' id='file'/></p>
							<p><label>Tên</label><input name='name' type='text' class='text-long' value='".$row1[name]."' required/></p>
							<p><label>Ngày sinh</label><input name='birthday' type='text' class='text-long' value='".$row1[birthday]."' required/></p>
							<p><label>Giới tính</label><input name='sex' type='radio' value='1'";
if (logging_account(sex) == 1)
{
echo " checked > Nam <input name='sex' type='radio' value='2'";
}
else if (logging_account(sex) == 2)
{
echo "> Nam <input name='sex' type='radio' value='1' checked";
}
else
{
echo "> Nam <input name='sex' type='radio' value='1'";
}
echo "> Nữ</p>
							<p><label>Địa chỉ</label><input name='address' type='text' class='text-long' value='".$row1[address]."' required/></p>
							<p><label>Yahoo</label><input name='yahoo' type='text' class='text-long' value='".$row1[yahoo]."' required/></p>
							<p><label>Email</label><input name='email' type='text' class='text-long' value='".$row1[email]."' required/></p>
							<p><label>Điện thoại</label><input name='phone' type='text' class='text-long' value='".$row1[phone]."' required/></p>
							<p><label>Mật khẩu (MD5)</label><input name='pass' type='password' class='text-long' value=''/></p>
                            <input name='id' type='hidden' value='".$_GET[id]."' />
							<input name='edituser' type='submit' value='Chỉnh sửa' />
                        </fieldset>
				</form>";
}
else { echo "Có lỗi<br/><br/>"; }
} 
else { echo "Có lỗi<br/><br/>"; }
require_once("footer.php");
?>