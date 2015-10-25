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
if ($_GET['id'] == NULL)
{
$_GET['id']=$_SESSION['userid'];
}
$id=$_GET['id'];
$sql="SELECT * FROM `users` where `id`='".$id."'";
$query=@mysql_query($sql);
if(@mysql_num_rows($query) == NULL)
	{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được thành viên!</p>";
	}
	else
	{
$title="Danh sách đề đã đóng góp của ".account($id,username);
$description="Danh sách đề đã đóng góp của ".account($id,username);
$keyword="Danh sách đề đã đóng góp,đề đã đóng góp,danh sach de da dong gop,de da dong gop,".account($id,username);
require_once("header.php");
$sql="";
$i=0;
$x=logging_account(up);
$y=explode(',',$x);
$display=15;
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
foreach ($y as $id2)
{
$i++;
if ($i == 1)
{
$sql=$sql."SELECT * FROM `tests` where `id`='".$id2."'";
}
else
{
$sql=$sql." UNION SELECT * FROM `tests` where `id`='".$id2."'";
}
}
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
	$x=$_SERVER['REQUEST_URI'];
	$kt="/danh-sach-de-da-dong-gop-cua-".strtolower(str_filter(account($id,username)))."-".$id."";
	$kt2="/danh-sach-de-da-dong-gop-cua-".strtolower(str_filter(account($id,username)))."-".$id."_".$p."";
	if ($x != $kt)
	{
		if ($x != $kt2)
		{
			if ($p == 1)
			{
				header("refresh: 0; url=".$kt."" );
			}
			else
			{
				header("refresh: 0; url=".$kt2."" );
			}
		}
		else
		{
			if ($p == 1)
			{
				header("refresh: 0; url=".$kt."" );
			}
		}
	}
// END Kiểm Tra
$start=($p-1)*$display; // Tính $start dùng trong LIMIT
if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
$sql2=$sql." order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSD
$query2=@mysql_query($sql2); // Lấy CSDL
echo "<fieldset class='fieldset'>
<legend href='#'><a href='#' style='color: #fff;'>Danh sách đề đã đóng góp của ".account($id,username)." <i>(".@mysql_num_rows($query)." đề kiểm tra)</i></a></legend>";
while ($row2=@mysql_fetch_array($query2))
{
	// Lấy cate1
	$sql11="SELECT * FROM `cate1` where `id`=".$row2[id1];
	$query11=@mysql_query($sql11);
	$row11=@mysql_fetch_array($query11);
	// Lấy cate2
	$sql22="SELECT * FROM `cate2` where `id`=".$row11[id2];
	$query22=@mysql_query($sql22);
	$row22=@mysql_fetch_array($query22);
	// Lấy cate3
	$sql33="SELECT * FROM `cate3` where `id`=".$row22[id3];
	$query33=@mysql_query($sql33);
	$row33=@mysql_fetch_array($query33);
echo "
<table class='lololol' width='100%'>
<tr>
<td rowspan='3' align='center'>
<img src='".$row2['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php'><div class='more2'>Xem</div></a>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php' style='font-size: 1.2em;'><b>".cu_t($row2[title],40)."</b></a>
</td>
</tr>
<tr>
<td width='*'>
Ngày đăng: <i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px' rowspan='2'>
Lượt xem: <i id='yeah'>".$row2[view]."</i>
</td>
</tr>
<tr>
<td width='*'>
Danh mục: <i id='yeah'><a href='./".strtolower(str_filter($row33[title])).".".$row33[id]."'>".$row33[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title])).".".$row22[id]."'>".$row22[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title]))."/".strtolower(str_filter($row11[title])).".".$row11[id]."'>".$row11[title]."</a></i></td>
</tr>
</table>
";
}
echo "</fieldset>";
if ($page > 1) // Hiện thị thanh chuyển trang
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./danh-sach-de-da-tai-cua-".strtolower(str_filter(account($id,username)))."-".$id."' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./danh-sach-de-da-tai-cua-".strtolower(str_filter(account($id,username)))."-".$id."_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-de-da-tai-cua-".strtolower(str_filter(account($id,username)))."-".$id."_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./danh-sach-de-da-tai-cua-".strtolower(str_filter(account($id,username)))."-".$id."_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-de-da-tai-cua-".strtolower(str_filter(account($id,username)))."-".$id."_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./danh-sach-de-da-tai-cua-".strtolower(str_filter(account($id,username)))."-".$id."_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
require_once("footer.php");
?>