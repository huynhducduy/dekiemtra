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
?>
<script type='text/javascript'>
		function get_cg3() {
			if (window.XMLHttpRequest)
			httpsocket = new XMLHttpRequest();
			else if (window.ActiveXObject)
			httpsocket = new ActiveXObject("Microsoft.XMLHTTP"); 
			httpsocket.open("POST","../getcg.php",true);
			httpsocket.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			httpsocket.onreadystatechange=rec_cg3;
			httpsocket.send("cg3=" + document.getElementById('cg3').value);
		}
		function rec_cg3() {
			if(httpsocket.readyState==4) {
				if(httpsocket.status==200 || httpsocket.status==304) {
					document.getElementById('cg2').innerHTML=httpsocket.responseText;
				}
			}
		}
		
		function get_cg2() {
			if (window.XMLHttpRequest)
			httpsocket = new XMLHttpRequest();
			else if (window.ActiveXObject)
			httpsocket = new ActiveXObject("Microsoft.XMLHTTP"); 
			httpsocket.open("POST","../getcg.php",true);
			httpsocket.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			httpsocket.onreadystatechange=rec_cg2;
			httpsocket.send("cg2=" + document.getElementById('cg2').value);
		}
		function rec_cg2() {
			if(httpsocket.readyState==4) {
				if(httpsocket.status==200 || httpsocket.status==304) {
					document.getElementById('cg1').innerHTML=httpsocket.responseText;
				}
			}
		}
</script>
<?php
echo "
                    	<li><a href='testlist.php'>Danh sách đề kiểm tra</a></li>
                    	<li><a href='posttest.php'>Đăng đề kiểm tra</a></li>
						<li><a href='testreport.php'>Báo cáo đề kiểm tra</a></li>
						<li><a href='testcontri.php'>Đóng góp đề kiểm tra</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Chỉnh sửa đề kiểm tra</a></h2>
                <div id='main'>";
				if(isset($_POST["edittest"]))
{
edittest();
}
				echo "
				<br/>";
if ($_GET['id'] != NULL)
{
$sql1="SELECT * FROM `tests` where `id`='".$_GET[id]."'";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{ 
		$row1=@mysql_fetch_array($query1);
				echo "
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
						<fieldset>
                        	<p><label>Tiêu đề</label><input name='title' type='text' class='text-long' value='".$row1[title]."' required/></p>
							<p><label>Danh mục</label>";
echo "
<select name='cg3' id='cg3' class='text-medium' cols='10' required onchange='get_cg3()'>
<option value='0'>Lựa chọn</option>";
	$sql1a="SELECT * FROM `cate1` where `id`='".$row1[id1]."'";
	$query1a=@mysql_query($sql1a);
	$row1a=@mysql_fetch_array($query1a);
	$sql2a="SELECT * FROM `cate2` where `id`='".$row1a[id2]."'";
	$query2a=@mysql_query($sql2a);
	$row2a=@mysql_fetch_array($query2a);
	$sql3a="SELECT * FROM `cate3` where `id`='".$row2a[id3]."'";
	$query3a=@mysql_query($sql3a);
	$row3a=@mysql_fetch_array($query3a);
$sqla3="SELECT * FROM `cate3`"; 
$querya3=@mysql_query($sqla3); 
while($rowa3=@mysql_fetch_array($querya3))
{
if ($rowa3[id] == $row3a[id]) { echo "<option value='".$rowa3[id]."' selected>".$rowa3[title]."</option>"; }
else { echo "<option value='".$rowa3[id]."'>".$rowa3[title]."</option>"; }
}
echo "
</select>
<select name='cg2' id='cg2' class='text-medium' cols='10' required='' onchange='get_cg2()'>
<option value='0'>Lựa chọn</option>";
$sqla2="SELECT * FROM `cate2` where `id3`='".$row3a[id]."'"; 
$querya2=@mysql_query($sqla2); 
while($rowa2=@mysql_fetch_array($querya2))
{
if ($rowa2[id] == $row2a[id]) { echo "<option value='".$rowa2[id]."' selected>".$rowa2[title]."</option>"; }
else { echo "<option value='".$rowa2[id]."'>".$rowa2[title]."</option>"; }
}
echo "</select>
<select name='cg1' id='cg1' class='text-medium' cols='10' required=''>
<option value='0'>Lựa chọn</option>";
$sqla1="SELECT * FROM `cate1` where `id2`='".$row2a[id]."'"; 
$querya1=@mysql_query($sqla1); 
while($rowa1=@mysql_fetch_array($querya1))
{
if ($rowa1[id] == $row1a[id]) { echo "<option value='".$rowa1[id]."' selected>".$rowa1[title]."</option>"; }
else { echo "<option value='".$rowa1[id]."'>".$rowa1[title]."</option>"; }
}
echo "</select>";
$sqlt="SELECT * FROM `test_parts` where `it`='".$row1[id]."'"; 
$queryt=@mysql_query($sqlt); 
$rowt=@mysql_fetch_array($queryt);
$sqla="SELECT * FROM `answer_parts` where `it`='".$row1[id]."'"; 
$querya=@mysql_query($sqla); 
$rowa=@mysql_fetch_array($querya);
echo "</p>
							<p><label>Mô tả</label><textarea name='descrip' type='text' class='ckeditor'>".$row1[description]."</textarea></p>
							<p><label>Từ khóa</label><input name='key' type='text' class='text-long' value='".$row1[keyword]."' required/></p>
							<p><label>Ảnh minh họa</label><img src='".$row1[thumb]."' width='200px' height='200px'  style='margin-bottom: 6px'><br/><input name='file' id='file' type='file' value=''/></p>
							<p><label>Phần đề [<i>Google Doc Id</i>]</label><input name='test' type='text' class='text-long' value='".$rowt[gdocid]."' required/></p>
							<p><label>Phần đáp án [<i>Google Doc Id</i>]</label><input name='ans' type='text' class='text-long' value='".$rowa[gdocid]."'/></p>
                            <p><label>Số lượt xem</label><input name='view' type='text' class='text-long' value='".$row1[view]."'/></p>
							<p><label>Số like</label><input name='liked' type='text' class='text-long' value='".$row1[liked]."' required/></p>
							<p><label>Id người like</label><input name='uid_liked' type='text' class='text-long' value='".$row1[uid_liked]."'/></p>
							<input name='id' type='hidden' value='".$_GET[id]."' />
							<input name='edittest' type='submit' value='Chỉnh sửa' />
                        </fieldset>
				</form>";
}
else { echo "Có lỗi"; }
} 
else { echo "Có lỗi"; }
require_once("footer.php");
?>