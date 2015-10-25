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
                    	<li><a href='tposttest.php'>Đăng đề trắc nghiệm</a></li>
						<li><a href='ttesthistory.php'>Kết quả trắc nghiệm</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Chỉnh sửa đề trắc nghiệm</a></h2>";
				echo "<form action='' method='GET'>
<input type='text' name='s' class='s' placeholder='Thêm câu hỏi' value='".$_GET[s]."'>
<input type='hidden' name='id' value='".$_GET[id]."'>
</form>";
if (isset($_POST[tedittest]))
{
tedittest();
}
if (isset($_GET[id]))
{
$sqltest="SELECT * FROM `ques_parts` where `it`='".$_GET['id']."'";
$querytest=@mysql_query($sqltest);
if (@mysql_num_rows($querytest) != 0)
{
$sqlt="SELECT * FROM `tests` where `id`='".$_GET[id]."'";
$queryt=@mysql_query($sqlt);
$rowt=@mysql_fetch_array($queryt);
echo "                <div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>
				<fieldset>
				<p><label>Thời gian làm của đề trắc nghiệm <i>(phút)</i></label>
				<input name='time2' class='text-long' type='text'/ value='".$rowt[time2]."'></p>
				</fieldset>";
{
$i=0;
while ($rowtest=@mysql_fetch_array($querytest))
{
$i++;
echo "<fieldset>
<p><label>Câu hỏi ".$i."</label>
<textarea type='text' name='ques".$i."' class='ckeditor'>".$rowtest[content]."</textarea></p>
<p><label>Đáp án ".$i." <i>(Các đáp án ngăn cách nhau bởi dấu |-|)</i></label>
<textarea type='text' name='2ques".$i."' class='ckeditor'>".$rowtest[answer]."</textarea></p>
<p><label>Đáp án đúng ".$i." <i>(Nhập thứ tự đáp án)</i></label>
<input name='tques".$i."' class='text-long' type='text' value='".$rowtest[tf]."'/></p>
<p><label>Số điểm câu hỏi ".$i."</label>
<input name='sques".$i."' class='text-long' type='text' value='".$rowtest[score]."'/></p>
<input name='id".$i."' type='hidden' value='".$rowtest[id]."'/>
</fieldset>";
}
if (isset($_GET[s]))
{
$lol=$i+$_GET[s];
while ($i<$lol)
{
$i++;
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
}
else { $lol=$i; }
echo "<input name='ss' type='hidden' value='".$lol."'/><input name='tedittest' type='submit' value='Chỉnh sửa đề trắc nghiệm' /><br/><br/><br/>";
}
echo "</form><br/>";
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