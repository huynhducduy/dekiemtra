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
                    	<li><a href='testlist.php'>Danh sách đề kiểm tra</a></li>
                    	<li><a href='posttest.php'>Đăng đề kiểm tra</a></li>
						<li><a href='testreport.php'>Báo cáo đề kiểm tra</a></li>
						<li><a href='testcontri.php'  class='active'>Đóng góp đề kiểm tra</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Đóng góp đề kiểm tra</a></h2>
                <div id='main'>
				<br/>";
if ($_GET['id'] != NULL)
{
$sql1="SELECT * FROM `contributions` where `id`='".$_GET[id]."'"; 
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{
$row1=@mysql_fetch_array($query1);
				echo "
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
						<fieldset>
                        	<p><label>Tiêu đề</label><input name='title' type='text' class='text-long' value='".$row1[title]."' readonly/></p>
							<p><label>Danh mục</label>";
$sql="SELECT * FROM `cate1` where `id`='".$row1[cg1]."'"; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
$sql2="SELECT * FROM `cate2` where `id`='".$row[id2]."'"; 
$query2=@mysql_query($sql2); 
$row2=@mysql_fetch_array($query2);
$sql3="SELECT * FROM `cate3` where `id`='".$row2[id3]."'"; 
$query3=@mysql_query($sql3); 
$row3=@mysql_fetch_array($query3);
echo "
<select name='cg3' id='cg3' class='text-medium' cols='10' required readonly>
<option value='".$row[id]."'>".$row3[title]."</option></select>
<select name='cg2' id='cg2' class='text-medium' cols='10' required readonly>
<option value='".$row[id]."'>".$row2[title]."</option></select>
<select name='cg1' id='cg1' class='text-medium' cols='10' required readonly>
<option value='".$row[id]."'>".$row[title]."</option></select></p>";
$sql4="SELECT * FROM `users` where `id`='".$row1[uploader]."'"; 
$query4=@mysql_query($sql4); 
$row4=@mysql_fetch_array($query4);
							echo "
							<p><label>Mô tả</label><textarea name='descrip' type='text' class='text-long' readonly>".$row1[content]."</textarea></p>
							<p><label>Nguồn</label><input name='origin' type='text' class='text-long' value='".$row1[origin]."' readonly/></p>
							<p><label>File</label><input name='file' type='text' class='text-long' style='width: 615px; margin-right: 5px;' value='".$row1[source]."' readonly/><a href='".$row1[source]."'><img style='padding-top: 3px;' src='./img/download.png'></a></p>
							<p><label>Người đóng góp</label><input name='uploader' type='text' class='text-long' value='".$row4[username]."' readonly/></p>
                        </fieldset>
				</form>";
}
else { echo "Có lỗi"; }
}
else
{ echo "Có lỗi"; }
require_once("footer.php");
?>