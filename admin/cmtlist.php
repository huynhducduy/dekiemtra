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
document.getElementById('x8').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='cmtlist.php' class='active'>Danh sách bình luận</a></li>
                    </ul>
                </div>
				<form action='' method='GET'>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Danh sách bình luận</a>
				<input type='text' placeholder='Tìm kiếm' name='key' class='search' value='".$_GET['key']."'/>
				</h2></form>
                <div id='main'>
				<br/>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
						<table cellpadding='0' cellspacing='0' style='width: 100%'>";
$display=20; // Số lượng item hiển thị
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
if (isset($_GET['key']))
{
$sql="SELECT * FROM `comments` where `content` LIKE '%".mysql_escape_string($_GET['key'])."%'";
}
else
{
$sql="SELECT * FROM `comments`";
}
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
if ($record != 0) {
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
// END Kiểm Tra
$start=($p-1)*$display; // Tính $start dùng trong LIMIT
if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
if (isset($_GET['key']))
{
$sql2="SELECT * FROM `comments` where `content` LIKE '%".mysql_escape_string($_GET['key'])."%' order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
}
else
{
$sql2="SELECT * FROM `comments` order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
}
$sql2="SELECT * FROM `comments` order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
while ($row2=@mysql_fetch_array($query2))
{
if ($row2[it] != 0)
{
$sqlt="SELECT * from `tests` where `id`='".$row2[it]."'";
$queryt=@mysql_query($sqlt);
$rowt=@mysql_fetch_array($queryt);
$link="../".strtolower(str_filter($rowt['title'])).".".$rowt['id'].".php";
}
if ($row2[tid] != 0)
{
$sqlvv="SELECT * from `test_history` where `id`='".$row2[tid]."'";
$queryvv=@mysql_query($sqlvv);
$rowvv=@mysql_fetch_array($queryvv);
$sqlt="SELECT * from `tests` where `id`='".$rowvv[it]."'";
$queryt=@mysql_query($sqlt);
$rowt=@mysql_fetch_array($queryt);
$link="../".strtolower(str_filter($rowt['title'])).".".$rowt['id'].".test";
}
$i++;
if ($i%2 == 0) 
{
echo "<tr>" ;
} 
else 
{ 
echo "<tr class='odd'>"; 
}
echo "
                                <td><a target='_blank' href='".$link."'>".cu_t($row2[content],135)."</a></td>
                                <td class='action'><a target='_blank' href='".$link."' class='view'>Xem</a><a href='editcmt.php?id=".$row2['id']."' class='edit'>Sửa</a><a href='delcmt.php?id=".$row2['id']."' class='delete'>Xóa</a></td>
                            </tr>
";
}
echo "</table></form><br/>";
if ($page > 1) // Hiện thị thanh chuyển trang
{
if (isset($_GET['key']))
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./cmtlist.php?key=".$_GET[key]."' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./cmtlist.php?p=".$prev."&key=".$_GET[key]."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./cmtlist.php?p=".$prev."&key=".$_GET[key]."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./cmtlist.php?p=".$next."&key=".$_GET[key]."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./cmtlist.php?p=".$next."&key=".$_GET[key]."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./cmtlist.php?p=".$page."&key=".$_GET[key]."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
else
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./cmtlist.php?p=' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./cmtlist.php?p=".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./cmtlist.php?p=".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./cmtlist.php?p=".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./cmtlist.php?p=".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./cmtlist.php?p=".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
echo "<br/>";
}
}
}
else {
echo "Chưa có bình luận nào"; 
echo "</table></form><br/>";}
require_once("footer.php");
?>