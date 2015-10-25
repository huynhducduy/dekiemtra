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
// Nếu lấy cate1 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cg1']) && (INT)($_GET['cg1'])) 
{
$cg1=$_GET['cg1'];
$sqlcg1="SELECT * FROM `cate1` where `id`='".$cg1."'";
$querycg1=@mysql_query($sqlcg1);
if(@mysql_num_rows($querycg1) == NULL)
	{
	$title="Có lỗi";
	$description="Có lỗi";
	$keyword="Có lỗi,lỗi,co loi,loi";
	require_once("header.php");
	echo "<p class='message_red'>Không xác định được danh mục đề kiểm tra, hoặc có thể đề kiểm tra đã bị xóa. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else
	{
$rowcg1=@mysql_fetch_array($querycg1);
$sqlcg2="SELECT * FROM `cate2` where `id`='".$rowcg1[id2]."'";
$querycg2=@mysql_query($sqlcg2);
$rowcg2=@mysql_fetch_array($querycg2);
$sqlcg3="SELECT * FROM `cate3` where `id`='".$rowcg2[id3]."'";
$querycg3=@mysql_query($sqlcg3);
$rowcg3=@mysql_fetch_array($querycg3);
$this3=$rowcg2[id3];
$title=$rowcg1[title];
$description=$rowcg1[description];
$keyword=$rowcg1[keyword];
$title2=$rowcg2[title];
$link2=strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id];
$title3=$rowcg3[title];
$link3=strtolower(str_filter($rowcg3[title])).".".$rowcg3[id];
require_once("header.php");
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
$sql="SELECT * FROM `tests` where `id1`='".$cg1."'";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
$x=$_SERVER['REQUEST_URI'];
$kt="/".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$cg1."";
$kt2="/".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$cg1."_".$p."";
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
$sql2="SELECT * FROM `tests` where `id1`=".$cg1." order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
echo "<fieldset class='fieldset'>
<legend href='#'><a href='#' style='color: #fff;'>".$rowcg1[title]."&nbsp;<i>(".@mysql_num_rows($query)." đề kiểm tra)</i></a></legend><table>";
while ($row2=@mysql_fetch_array($query2))
{
echo "
<table class='lololol' width='100%'>
<tr>
<td rowspan='3' align='center'>
<img src='".$row2['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php'><div class='more2'>Xem</div></a>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php' style='font-size: 1.2em;' alt='".$row2['title']."' title='".$row2['title']."'><b>".cu_t($row2[title],50)."</b></a>";
if ($row2[rt] != 0)
{
echo "&nbsp;<img src='./images/blue-tick.png' width='18px' alt='Có thể làm thử đề kiểm tra' title='Có thể làm thử đề kiểm tra'>";
}
echo "
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/clock2.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px'>
<img src='./images/eye.png' width='20px' style='margin-top: 0; margin-bottom: -5px'/>&nbsp;<span id='yeah'>".$row2[view]."</span>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/list.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."'>".$rowcg3[title]."</a> > <a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."'>".$rowcg2[title]."</a> > <a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."'>".$rowcg1[title]."</a></i>
</td><td>
<img src='./images/like.png' width='20px' style='margin-top: -5px; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[liked]."</span>
</td>
</tr>
</table>
";
}
echo "</table></fieldset>";
if ($page > 1) // Hiện thị thanh chuyển trang
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."_1' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
}
else if (isset($_GET['cg2']) && (INT)($_GET['cg2'])) 
{
// Nếu lấy cate2 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cg2=$_GET['cg2'];
$sqlcg2="SELECT * FROM `cate2` where `id`='".$cg2."'";
$querycg2=@mysql_query($sqlcg2);
if(@mysql_num_rows($querycg2) == NULL)
	{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được danh mục đề kiểm tra, hoặc có thể đề kiểm tra đã bị xóa. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else
	{
	$rowcg2=@mysql_fetch_array($querycg2);
	$sqlcg3="SELECT * FROM `cate3` where `id`='".$rowcg2[id3]."'";
	$querycg3=@mysql_query($sqlcg3);
	$rowcg3=@mysql_fetch_array($querycg3);
	$this3=$rowcg2[id3];
$title=$rowcg2[title];
$description=$rowcg2[description];
$keyword=$rowcg2[keyword];
$title2=$rowcg3[title];
$link2=strtolower(str_filter($rowcg3[title])).".".$rowcg3[id];
require_once("header.php");
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
$sqlcg1="SELECT * FROM `cate1` where `id2`='".$rowcg2[id]."'";
$querycg1=@mysql_query($sqlcg1);
$sql="";
echo "<fieldset class='fieldset'>
<legend href='#'><a href='#' style='color: #fff;'>".$rowcg2[title]."&nbsp;<i>(".@mysql_num_rows($querycg1)." chỉ mục)</i></a></legend><table>";
$i=0;
while ($rowcg1=@mysql_fetch_array($querycg1))
{
$i++;
if ($i == 1)
{
$sql=$sql."SELECT * FROM `tests` where `id1`='".$rowcg1[id]."'";
}
else
{
$sql=$sql." UNION SELECT * FROM `tests` where `id1`='".$rowcg1[id]."'";
}
echo "<div class='sub'><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($rowcg1[title])).".".$rowcg1[id]."'>".$rowcg1[title]."</a></div>";
}
echo "</table></fieldset>";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
$x=$_SERVER['REQUEST_URI'];
$kt="/".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$cg2."";
$kt2="/".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$cg2."_".$p."";
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
$sql2=$sql." order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
echo "<fieldset class='fieldset'>
<legend href='#'><a href='#' style='color: #fff;'>".$rowcg2[title]."&nbsp;<i>(".@mysql_num_rows($query)." đề kiểm tra)</i></a></legend><table>";
while ($row2=@mysql_fetch_array($query2))
{
// Lấy cate1
	$sql11="SELECT * FROM `cate1` where `id`='".$row2[id1]."'";
	$query11=@mysql_query($sql11);
	$row11=@mysql_fetch_array($query11);
echo "
<table class='lololol' width='100%'>
<tr>
<td rowspan='3' align='center'>
<img src='".$row2['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php'><div class='more2'>Xem</div></a>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php' style='font-size: 1.2em;' alt='".$row2['title']."' title='".$row2['title']."'><b>".cu_t($row2[title],50)."</b></a>";
if ($row2[rt] != 0)
{
echo "&nbsp;<img src='./images/blue-tick.png' width='18px' alt='Có thể làm thử đề kiểm tra' title='Có thể làm thử đề kiểm tra'>";
}
echo "
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/clock2.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px'>
<img src='./images/eye.png' width='20px' style='margin-top: 0; margin-bottom: -5px'/>&nbsp;<span id='yeah'>".$row2[view]."</span>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/list.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."'>".$rowcg3[title]."</a> > <a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."'>".$rowcg2[title]."</a> > <a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title]))."/".strtolower(str_filter($row11[title])).".".$row11[id]."'>".$row11[title]."</a></i>
</td><td>
<img src='./images/like.png' width='20px' style='margin-top: -5px; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[liked]."</span>
</td>
</tr>
</table>
";
}
echo "</table></fieldset>";
if ($page > 1) // Hiện thị thanh chuyển trang
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."_1' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
}
// Nếu lấy cate3 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (isset($_GET['cg3']) && (INT)($_GET['cg3'])) 
{
$cg3=$_GET['cg3'];
$sqlcg3="SELECT * FROM `cate3` where `id`='".$cg3."'";
$querycg3=@mysql_query($sqlcg3);
if(@mysql_num_rows($querycg3) == NULL)
	{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được danh mục đề kiểm tra, hoặc có thể đề kiểm tra đã bị xóa. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else
	{
	$rowcg3=@mysql_fetch_array($querycg3);
	$this3=$_GET['cg3'];
$title=$rowcg3[title];
$description=$rowcg3[description];
$keyword=$rowcg3[keyword];
require_once("header.php");
	if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
	$sqlcg2="SELECT * FROM `cate2` where `id3`='".$rowcg3[id]."'";
	$querycg2=@mysql_query($sqlcg2);
	$sql="";
	echo "<fieldset class='fieldset'>
	<legend href='#'><a href='#' style='color: #fff;'>".$rowcg3[title]."&nbsp;<i>(".@mysql_num_rows($querycg2)." chỉ mục)</i></a></legend><table>";
	$i=0;
	while ($rowcg2=@mysql_fetch_array($querycg2))
	{
		$sqlcg1="SELECT * FROM `cate1` where `id2`='".$rowcg2[id]."'";
		$querycg1=@mysql_query($sqlcg1);
		while ($rowcg1=@mysql_fetch_array($querycg1))
			{
			$i++;
			if ($i == 1)
			{
			$sql=$sql."SELECT * FROM `tests` where `id1`='".$rowcg1[id]."'";
			}
			else
			{
			$sql=$sql." UNION SELECT * FROM `tests` where `id1`='".$rowcg1[id]."'";
			}
			}
	echo "<div class='sub'><a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($rowcg2[title])).".".$rowcg2[id]."'>".$rowcg2[title]."</a></div>";
	}
	echo "</table></fieldset>";
	$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
$x=$_SERVER['REQUEST_URI'];
$kt="/".strtolower(str_filter($rowcg3[title])).".".$cg3."";
$kt2="/".strtolower(str_filter($rowcg3[title])).".".$cg3."_".$p."";
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
$sql2=$sql." order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
echo "<fieldset class='fieldset'>
<legend href='#'><a href='#' style='color: #fff;'>".$rowcg3[title]."&nbsp;<i>(".@mysql_num_rows($query)." đề kiểm tra)</i></a></legend><table>";
while ($row2=@mysql_fetch_array($query2))
{
// Lấy cate1
	$sql11="SELECT * FROM `cate1` where `id`='".$row2[id1]."'";
	$query11=@mysql_query($sql11);
	$row11=@mysql_fetch_array($query11);
	// Lấy cate2
	$sql22="SELECT * FROM `cate2` where `id`='".$row11[id2]."'";
	$query22=@mysql_query($sql22);
	$row22=@mysql_fetch_array($query22);
echo "
<table class='lololol' width='100%'>
<tr>
<td rowspan='3' align='center'>
<img src='".$row2['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php'><div class='more2'>Xem</div></a>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php' style='font-size: 1.2em;' alt='".$row2['title']."' title='".$row2['title']."'><b>".cu_t($row2[title],50)."</b></a>";
if ($row2[rt] != 0)
{
echo "&nbsp;<img src='./images/blue-tick.png' width='18px' alt='Có thể làm thử đề kiểm tra' title='Có thể làm thử đề kiểm tra'>";
}
echo "
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/clock2.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px'>
<img src='./images/eye.png' width='20px' style='margin-top: 0; margin-bottom: -5px'/>&nbsp;<span id='yeah'>".$row2[view]."</span>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/list.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."'>".$rowcg3[title]."</a> > <a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($row22[title])).".".$row22[id]."'>".$row22[title]."</a> > <a href='./".strtolower(str_filter($rowcg3[title]))."/".strtolower(str_filter($row22[title]))."/".strtolower(str_filter($row11[title])).".".$row11[id]."'>".$row11[title]."</a></i></td>
<td>
<img src='./images/like.png' width='20px' style='margin-top: -5px; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[liked]."</span>
</td>
</tr>
</table>
";
}
echo "</table></fieldset>";
if ($page > 1) // Hiện thị thanh chuyển trang
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."_1' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./".strtolower(str_filter($rowcg3[title])).".".$rowcg3[id]."_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
}
else
{
// Nếu lấy toàn bộ ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$title="Đề kiểm tra mới nhất";
$description="Đề kiểm tra mới nhất";
$keyword="Đề kiểm tra mới nhất,de kiem tra moi nhat";
require_once("header.php");
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
$sql="SELECT * FROM `tests`";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
// END Kiểm Tra
$start=($p-1)*$display; // Tính $start dùng trong LIMIT
if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
$sql2="SELECT * FROM `tests` order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
echo "<fieldset class='fieldset'>
<legend href='#'><a href='#' style='color: #fff;'>Đề kiểm tra mới nhất <i>(".@mysql_num_rows($query)." đề kiểm tra)</i></a></legend>";
while ($row2=@mysql_fetch_array($query2))
{
	// Lấy cate1
	$sql11="SELECT * FROM `cate1` where `id`='".$row2[id1]."'";
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
<img src='".$row2['thumb']."' width='60' height='61' class='img2'>
</td>
<td class='title' colspan=2 width='100%'>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php'><div class='more2'>Xem</div></a>
<a href='./".strtolower(str_filter($row2['title'])).".".$row2['id'].".php' style='font-size: 1.2em;' alt='".$row2['title']."' title='".$row2['title']."'><b>".cu_t($row2[title],50)."</a></b>";
if ($row2[rt] != 0)
{
echo "&nbsp;<img src='./images/blue-tick.png' width='18px' alt='Có thể làm thử đề kiểm tra' title='Có thể làm thử đề kiểm tra'>";
}
echo "
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/clock2.png' width='15px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'>".ti_me($row2[time])."</i>
</td>
<td width='100px'>
<img src='./images/eye.png' width='20px' style='margin-top: 0; margin-bottom: -5px'/>&nbsp;<span id='yeah'>".$row2[view]."</span>
</td>
</tr>
<tr>
<td width='*'>
<img src='./images/list.png' width='16px' style='margin-top: 0; margin-bottom: -2px'/>&nbsp;<i id='yeah'><a href='./".strtolower(str_filter($row33[title])).".".$row33[id]."'>".$row33[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title])).".".$row22[id]."'>".$row22[title]."</a> > <a href='./".strtolower(str_filter($row33[title]))."/".strtolower(str_filter($row22[title]))."/".strtolower(str_filter($row11[title])).".".$row11[id]."'>".$row11[title]."</a></i></td>
<td>
<img src='./images/like.png' width='20px' style='margin-top: -5px; margin-bottom: -2px'/>&nbsp;<span id='yeah'>".$row2[liked]."</span>
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
		echo "<li><b><a href='./latest_1' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./latest_".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./latest_".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./latest_".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./latest_".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./latest_".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
require_once("footer.php");
?>