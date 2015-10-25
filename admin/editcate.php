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
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Chỉnh sửa danh mục</a></h2>
                <div id='main'>
				<br/>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>";
// Nếu lấy cate1 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cg1']) && (INT)($_GET['cg1'])) 
{
$sql1="SELECT * FROM `cate1` where `id`='".$_GET[cg1]."'";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{ 
		$row1=@mysql_fetch_array($query1);
		$sql2a="SELECT * FROM `cate2` where `id`='".$row1[id2]."'";
		$query2a=@mysql_query($sql2a);
		$row2a=@mysql_fetch_array($query2a);
		$sql3a="SELECT * FROM `cate3` where `id`='".$row2a[id3]."'";
		$query3a=@mysql_query($sql3a);
		$row3a=@mysql_fetch_array($query3a);
		echo"<form action='' class='jNice' method='post'>
<fieldset><p><label>Danh mục</label>
<select name='cg3' id='cg3' class='text-medium' cols='10' readonly>
<option value='".$row3a[id]."'>".$row3a[title]."</option>
</select>
<select name='cg2' id='cg2' class='text-medium' cols='10' readonly>
<option value='".$row2a[id]."'>".$row2a[title]."</option>
</select>
<p><label>Tiêu đề</label><input name='title' type='text' class='text-long' value='".$row1[title]."' required/></p>
<p><label>Mô tả</label><input name='description' type='text' class='text-long' value='".$row1[description]."' required/></p>
<p><label>Từ khóa</label><input name='keyword' type='text' class='text-long' value='".$row1[keyword]."' required/></p>
<input name='id' type='hidden' value='".$_GET[cg1]."' />
<input name='editcate' type='submit' value='Chỉnh sửa' />
</fieldset>
</form>";
		}
		else { echo "Có lỗi"; }
}
// Nếu lấy cate2 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (isset($_GET['cg2']) && (INT)($_GET['cg2'])) 
{
$sql1="SELECT * FROM `cate2` where `id`='".$_GET[cg2]."'";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{ 
		$row1=@mysql_fetch_array($query1);
		$sql3a="SELECT * FROM `cate3` where `id`='".$row1[id3]."'";
		$query3a=@mysql_query($sql3a);
		$row3a=@mysql_fetch_array($query3a);
		echo"<form action='' class='jNice' method='post'>
<fieldset><p><label>Danh mục</label>
<select name='cg3' id='cg3' class='text-medium' cols='10' readonly>
<option value='".$row3a[id]."'>".$row3a[title]."</option>
</select>
<p><label>Tiêu đề</label><input name='title' type='text' class='text-long' value='".$row1[title]."' required/></p>
<p><label>Mô tả</label><input name='description' type='text' class='text-long' value='".$row1[description]."' required/></p>
<p><label>Từ khóa</label><input name='keyword' type='text' class='text-long' value='".$row1[keyword]."' required/></p>
<input name='id' type='hidden' value='".$_GET[cg2]."' />
<input name='editcate' type='submit' value='Chỉnh sửa' />
</fieldset>
</form>";
		}
		else { echo "Có lỗi"; }
}
// Nếu lấy cate3 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (isset($_GET['cg3']) && (INT)($_GET['cg3'])) 
{
$sql1="SELECT * FROM `cate3` where `id`='".$_GET[cg3]."'";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{ 
		$row1=@mysql_fetch_array($query1);
		echo"<form action='' class='jNice' method='post'>
		<fieldset>
<p><label>Tiêu đề</label><input name='title' type='text' class='text-long' value='".$row1[title]."' required/></p>
<p><label>Mô tả</label><input name='description' type='text' class='text-long' value='".$row1[description]."' required/></p>
<p><label>Từ khóa</label><input name='keyword' type='text' class='text-long' value='".$row1[keyword]."' required/></p>
<input name='id' type='hidden' value='".$_GET[cg3]."' />
<input name='editcate' type='submit' value='Chỉnh sửa' />
</fieldset>
</form>";
		}
		else { echo "Có lỗi"; }
}
else
{
echo "Có lỗi";
}
					echo "</form>
					<br/>";
if(isset($_POST["editcate"]))
{
editcate();
}
require_once("footer.php");
?>