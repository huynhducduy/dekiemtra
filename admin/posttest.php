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
                    	<li><a href='posttest.php' class='active'>Đăng đề kiểm tra</a></li>
						<li><a href='testreport.php'>Báo cáo đề kiểm tra</a></li>
						<li><a href='testcontri.php'>Đóng góp đề kiểm tra</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Đăng đề kiểm tra</a></h2>
                <div id='main'>";
if(isset($_POST["posttest"]))
{
posttest();
}
				echo "
				<br/>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
						<fieldset>
                        	<p><label>Tiêu đề</label><input name='title' type='text' class='text-long' value='".$_GET[title]."' required/></p>
							<p><label>Danh mục</label>";
if ($_GET[cg1] == NULL)
{
echo "
<select name='cg3' id='cg3' class='text-medium' cols='10' required onchange='get_cg3()'>
<option value='0'>Lựa chọn</option>";
$sql="SELECT * FROM `cate3`"; 
$query=@mysql_query($sql); 
while($row=@mysql_fetch_array($query))
{
echo "<option value='".$row[id]."'>".$row[title]."</option>";
}
echo "
</select>
<select name='cg2' id='cg2' class='text-medium' cols='10' required='' onchange='get_cg2()'>
<option value='0'>Lựa chọn</option></select>
<select name='cg1' id='cg1' class='text-medium' cols='10' required=''>
<option value='0'>Lựa chọn</option></select>";
}
else {
$sql="SELECT * FROM `cate1` where `id`='".$_GET[cg1]."'"; 
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
<option value='".$row[id]."'>".$row[title]."</option></select>";
}
echo "</p>
							<p><label>Mô tả</label><textarea name='descrip' type='text' class='ckeditor'>".$_GET[des]."</textarea></p>
							<p><label>Từ khóa</label><input name='key' type='text' class='text-long' value='' required/></p>
							<p><label>Ảnh minh họa</label><input name='file' id='file' type='file' value='' required/></p>
							<p><label>Phần đề [<i>Google Doc Id</i>]</label><input name='test' type='text' class='text-long' value='' required/></p>
							<p><label>Phần đáp án [<i>Google Doc Id</i>]</label><input name='ans' type='text' class='text-long' value=''/></p>
							<input name='contri' type='hidden' value='".$_GET[contri]."'/>
                            <input name='posttest' type='submit' value='Đăng' />
                        </fieldset>
				</form>";
require_once("footer.php");
?>