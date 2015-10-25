<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); 
require_once("config.php");
require_once("function.php");
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_COOKIE["cookid"]))
{
$_SESSION["userid"] = $_COOKIE["cookid"];
}
if ($_SESSION['userid'] == NULL)
{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_yellow'>Bạn phải đăng nhập để thực hiện chức năng này!</p>";
}
else
{
$title="Đóng góp đề kiểm tra";
$description="Đóng góp đề kiểm tra";
$keyword="Đóng góp đề kiểm tra,đóng góp,đề kiểm tra,dong gop de kiem tra,dong gop,de kiem tra";
require_once("header.php");
?>
<script type='text/javascript'>
		function get_cg3() {
			if (window.XMLHttpRequest)
			httpsocket = new XMLHttpRequest();
			else if (window.ActiveXObject)
			httpsocket = new ActiveXObject("Microsoft.XMLHTTP"); 
			httpsocket.open("POST","getcg.php",true);
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
			httpsocket.open("POST","getcg.php",true);
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
echo "<center><p><h1>Đóng góp đề kiểm tra</h1></p></center>";
echo "<center>
<form action='' method='post' enctype='multipart/form-data'>
<table border='0'>
<tr><td><p>Tiêu đề</p></td><td><p><input name='title' type='text' value='' class='textbox' size='50' required/><br/></p></td></tr>
<tr><td><p>Danh mục</p></td><td><p>
<select name='cg3' id='cg3' class='textbox' cols='10' required onchange='get_cg3()'>
<option value='0'>Lựa chọn</option>";
$sql="SELECT * FROM `cate3`"; 
$query=@mysql_query($sql); 
while($row=@mysql_fetch_array($query))
{
echo "<option value='".$row[id]."'>".$row[title]."</option>";
}
echo "
</select>
<select name='cg2' id='cg2' class='textbox' cols='10' required='' onchange='get_cg2()'>
<option value='0'>Lựa chọn</option></select>
<select name='cg1' id='cg1' class='textbox' cols='10' required=''>
<option value='0'>Lựa chọn</option></select>
<br/></p></td></tr>
<tr><td><p>Bình luận</p></td><td><p><textarea name='content' type='text' class='textbox' required/></textarea><br/></p></td></tr>
<tr><td><p>Đề kiểm tra</p></td><td><p><input type='file' name='file' id='file' required/><br/></p></td></tr>
<tr><td><p>Nguồn</p></td><td><p><input name='origin' type='text' value='' class='textbox' size='50' /><br/></p></td></tr>
<tr><td><p>Mã bảo vệ</p></td><td><p><input name='capt' type='text' value='' class='textbox' size='36' required/>&nbsp;<img src='capt.php'/><br/></p></td></tr>
<tr><td></td><td><p><input type='submit' name='upload' value='Đóng góp' class='button' class='textbox'/></p></td></tr>
</table>
</form>
</center>
<br/>";
# echo "<br/><p><h2>Lưu ý khi đóng góp để kiểm tra</h2></p>
# - Blah blah blah...<br/>
# - Blah blah blah blah...
# ";
}
if(isset($_POST["upload"]))
{
upload();
}
require_once("footer.php");
?>