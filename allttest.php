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
$display=15; // Số lượng item hiển thị
if (isset($_GET['uid']) && (INT)($_GET['uid'])) 
{
$uid=$_GET['uid'];
$sqlth="SELECT * FROM `test_history` where `uid`='".$uid."'";
$queryth=@mysql_query($sqlth);
if(@mysql_num_rows($queryth) == NULL)
	{
	$title="Có lỗi";
	$description="Có lỗi";
	$keyword="Có lỗi,lỗi,co loi,loi";
	require_once("header.php");
	echo "<p class='message_red'>Người dùng không có thật hoặc chưa làm thử đề kiểm tra nào. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else 
	{
	$rowth=@mysql_fetch_array($queryth);
	$title="Danh sách báo cáo làm thử của thành viên: ".account($uid,username);
	require_once("header.php");
	if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
	$sql="SELECT * FROM `test_history` where `uid`='".$uid."'";
	$query=@mysql_query($sql);
	$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
	// Kiểm tra trang cần hiển thị có hợp lệ hay không
	if ($p > ceil($record/$display)) {$p=1;}
	if ($p <= 0) {$p=1;}
	$x=$_SERVER['REQUEST_URI'];
	$kt="/danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."";
	$kt2="/danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."_".$p."";
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
	$start=($p-1)*$display; // Tính $start dùng trong LIMIT
	if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
	$sql2="SELECT * FROM `test_history` where `uid`=".$uid." order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
	$query2=@mysql_query($sql2); // Lấy CSDL
	echo "<fieldset class='fieldset'>
	<legend href='#'><a href='#' style='color: #fff;'>Danh sách báo cáo làm thử của thành viên: ".account($uid,username)."&nbsp;<i>(".@mysql_num_rows($query)." báo cáo)</i></a></legend>";
while ($row2=@mysql_fetch_array($query2))
{
	// Lấy test
	$sqlt="SELECT * FROM `tests` where `id`='".$row2[it]."'";
	$queryt=@mysql_query($sqlt);
	$rowt=@mysql_fetch_array($queryt);
	// Lấy cate1
	$sql11="SELECT * FROM `cate1` where `id`='".$rowt[id1]."'";
	$query11=@mysql_query($sql11);
	$row11=@mysql_fetch_array($query11);
	// Lấy cate2
	$sql22="SELECT * FROM `cate2` where `id`='".$row11[id2]."'";
	$query22=@mysql_query($sql22);
	$row22=@mysql_fetch_array($query22);
	// Lấy cate3
	$sql33="SELECT * FROM `cate3` where `id`='".$row22[id3]."'";
	$query33=@mysql_query($sql33);
	$row33=@mysql_fetch_array($query33);
echo "
<table class='lololol' width='100%'>
<tr>
<td rowspan='3' align='center'>
<img src='".$rowt['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./bao-cao-lam-thu/".strtolower(str_filter(account($row2[uid],username)))."/".strtolower(str_filter($rowt[title]))."-".$row2[id]."'><div class='more2'>Xem</div></a>
<a href='./bao-cao-lam-thu/".strtolower(str_filter(account($row2[uid],username)))."/".strtolower(str_filter($rowt[title]))."-".$row2[id]."' style='font-size: 1.2em;' alt='".$rowt['title']."' title='".$rowt['title']."'><b>".cu_t($rowt[title],50)."</a></b>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/clock2.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px'>
<img src='./images/cup.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[score]."</span>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/list.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'><a href='./".strtolower(str_filter($row33[title])).".".$row33[id]."'>".$row33[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title])).".".$row22[id]."'>".$row22[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title]))."/".strtolower(str_filter($row11[title])).".".$row11[id]."'>".$row11[title]."</a></i></td>
<td>
<img src='./images/clock3.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[comp]." phút</span>
</td>
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
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu/".strtolower(str_filter(account($uid,username)))."-".account($uid,id)."_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
} else if (isset($_GET['it']) && (INT)($_GET['it']))
{
$it=$_GET['it'];
$sqlth="SELECT * FROM `test_history` where `it`='".$it."'";
$queryth=@mysql_query($sqlth);
if(@mysql_num_rows($queryth) == NULL)
	{
	$title="Có lỗi";
	$description="Có lỗi";
	$keyword="Có lỗi,lỗi,co loi,loi";
	require_once("header.php");
	echo "<p class='message_red'>Đề kiểm tra không có thật hoặc chưa có báo cáo làm thử cho đề kiểm tra này. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else 
	{
	$rowth=@mysql_fetch_array($queryth);
	// Lấy test
	$sqlt="SELECT * FROM `tests` where `id`='".$it."'";
	$queryt=@mysql_query($sqlt);
	$rowt=@mysql_fetch_array($queryt);
	$title="Danh sách báo cáo làm thử của: ".$rowt[title];
	require_once("header.php");
	if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
	$sql="SELECT * FROM `test_history` where `it`='".$it."'";
	$query=@mysql_query($sql);
	$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
	// Kiểm tra trang cần hiển thị có hợp lệ hay không
	if ($p > ceil($record/$display)) {$p=1;}
	if ($p <= 0) {$p=1;}
	$x=$_SERVER['REQUEST_URI'];
	$kt="/danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$rowt[id]."";
	$kt2="/danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$rowt[id]."_".$p.""; 
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
	$start=($p-1)*$display; // Tính $start dùng trong LIMIT
	if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
	$sql2="SELECT * FROM `test_history` where `it`=".$it." order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
	$query2=@mysql_query($sql2); // Lấy CSDL
	echo "<fieldset class='fieldset'>
	<legend href='#'><a href='#' style='color: #fff;'>Danh sách báo cáo làm thử của đề kiểm tra này&nbsp;<i>(".@mysql_num_rows($query)." báo cáo)</i></a></legend>";
while ($row2=@mysql_fetch_array($query2))
{
	// Lấy cate1
	$sql11="SELECT * FROM `cate1` where `id`='".$row2[it]."'";
	$query11=@mysql_query($sql11);
	$row11=@mysql_fetch_array($query11);
	// Lấy cate2
	$sql22="SELECT * FROM `cate2` where `id`='".$row11[id2]."'";
	$query22=@mysql_query($sql22);
	$row22=@mysql_fetch_array($query22);
	// Lấy cate3
	$sql33="SELECT * FROM `cate3` where `id`='".$row22[id3]."'";
	$query33=@mysql_query($sql33);
	$row33=@mysql_fetch_array($query33);
echo "
<table class='lololol' width='100%'>
<tr>
<td rowspan='3' align='center'>
<img src='".$rowt['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./bao-cao-lam-thu/".strtolower(str_filter(account($row2[uid],username)))."/".strtolower(str_filter($rowt[title]))."-".$row2[id]."'><div class='more2'>Xem</div></a>
<a href='./bao-cao-lam-thu/".strtolower(str_filter(account($row2[uid],username)))."/".strtolower(str_filter($rowt[title]))."-".$row2[id]."' style='font-size: 1.2em;' alt='".$rowt['title']."' title='".$rowt['title']."'><b>".cu_t($rowt[title],50)."</a></b>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/clock2.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px'>
<img src='./images/cup.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[score]."</span>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/list.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'><a href='./".strtolower(str_filter($row33[title])).".".$row33[id]."'>".$row33[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title])).".".$row22[id]."'>".$row22[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title]))."/".strtolower(str_filter($row11[title])).".".$row11[id]."'>".$row11[title]."</a></i></td>
<td>
<img src='./images/clock3.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[comp]." phút</span>
</td>
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
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$it."' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$it."_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$it."_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$it."_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$it."_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($rowt[title]))."-".$it."_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
}
else {
$title="Báo cáo làm thử đề kiểm tra mới nhất";
$description="Báo cáo làm thử đề kiểm tra mới nhất";
$keyword="Báo cáo làm thử đề kiểm tra mới nhất,bao cao lam thu de kiem tra moi nhat";
require_once("header.php");
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
$sql="SELECT * FROM `test_history`";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
// END Kiểm Tra
$start=($p-1)*$display; // Tính $start dùng trong LIMIT
if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
$sql2="SELECT * FROM `test_history` order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
echo "<fieldset class='fieldset'>
<legend href='#'><a href='#' style='color: #fff;'>Báo cáo làm thử đề kiểm tra mới nhất</a></legend>";
while ($row2=@mysql_fetch_array($query2))
{
	// Lấy test
	$sqlt="SELECT * FROM `tests` where `id`='".$row2[it]."'";
	$queryt=@mysql_query($sqlt);
	$rowt=@mysql_fetch_array($queryt);
	// Lấy cate1
	$sql11="SELECT * FROM `cate1` where `id`='".$rowt[id1]."'";
	$query11=@mysql_query($sql11);
	$row11=@mysql_fetch_array($query11);
	// Lấy cate2
	$sql22="SELECT * FROM `cate2` where `id`='".$row11[id2]."'";
	$query22=@mysql_query($sql22);
	$row22=@mysql_fetch_array($query22);
	// Lấy cate3
	$sql33="SELECT * FROM `cate3` where `id`='".$row22[id3]."'";
	$query33=@mysql_query($sql33);
	$row33=@mysql_fetch_array($query33);
echo "
<table class='lololol' width='100%'>
<tr>
<td rowspan='3' align='center'>
<img src='".$rowt['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./bao-cao-lam-thu/".strtolower(str_filter(account($row2[uid],username)))."/".strtolower(str_filter($rowt[title]))."-".$row2['id']."'><div class='more2'>Xem</div></a>
<a href='./bao-cao-lam-thu/".strtolower(str_filter(account($row2[uid],username)))."/".strtolower(str_filter($rowt[title]))."-".$row2['id']."' style='font-size: 1.2em;' alt='".$rowt['title']."' title='".$rowt['title']."'><b>".cu_t($rowt[title],50)."</a></b>
</td>
</tr>
<tr>
<td width='*'>
Ngày làm: <i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px'>
Điểm: <i id='yeah'>".$row2[score]."</i>
</td>
</tr>
<tr>
<td width='*'>
Danh mục: <i id='yeah'><a href='./".strtolower(str_filter($row33[title])).".".$row33[id]."'>".$row33[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title])).".".$row22[id]."'>".$row22[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title]))."/".strtolower(str_filter($row11[title])).".".$row11[id]."'>".$row11[title]."</a></i></td>
<td>
Thời gian hoàn thành: ".$row2[comp]." phút
</td>
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
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-moi-nhat' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-moi-nhat_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-moi-nhat_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-moi-nhat_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-moi-nhat_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./danh-sach-bao-cao-lam-thu-moi-nhat_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
require_once("footer.php");
?>