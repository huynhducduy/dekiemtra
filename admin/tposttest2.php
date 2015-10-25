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
document.getElementById('x7').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='ttestlist.php'>Danh sách trắc nghiệm</a></li>
                    	<li><a href='tposttest.php' class='active'>Đăng đề trắc nghiệm</a></li>
						<li><a href='ttesthistory.php'>Kết quả trắc nghiệm</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Đăng đề trắc nghiệm - Bước 2</a></h2>";
if (isset($_POST[tposttest]))
{
tposttest();
}
if (isset($_GET[id]))
{
$sqltest="SELECT * FROM `tests` where `id`='".$_GET['id']."' and `rt`=0";
$querytest=@mysql_query($sqltest);
if (@mysql_num_rows($querytest) != 0)
{
if (isset($_GET[s]))
{
echo "                <div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>
				<fieldset>
				<p><label>Thời gian làm của đề trắc nghiệm <i>(phút)</i></label>
				<input name='time2' class='text-long' type='text'/></p>
				</fieldset>";
{
for($i=1; $i<=$_GET[s]; $i++)
{
echo "<fieldset>
<p><label>Câu hỏi ".$i."</label>
<textarea type='text' name='ques".$i."' class='ckeditor'></textarea></p>
<p><label>Đáp án ".$i." <i>(Các đáp án ngăn cách nhau bởi dấu |-|)</i></label>
<textarea type='text' name='2ques".$i."' class='ckeditor'></textarea></p>
<p><label>Đáp án đúng ".$i." <i>(Nhập thứ tự đáp án)</i></label>
<input name='tques".$i."' class='text-long' type='text'/></p>
<p><label>Số điểm câu hỏi ".$i."</label>
<input name='sques".$i."' class='text-long' type='text'/></p>
</fieldset>";
}
echo "<input name='tposttest' type='submit' value='Đăng đề trắc nghiệm' /><br/><br/><br/>";
}
echo "</form><br/>";
}
else
{
echo "<form action='' method='GET'>
<input type='text' name='s' class='s' placeholder='Số câu hỏi'>
<input type='hidden' name='id' value='".$_GET[id]."'>
</form>";
echo"                <div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				</form><br/>";
}
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
require_once("footer.php");
?>