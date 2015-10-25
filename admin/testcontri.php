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
echo "
<script>
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
				<br/>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
						<table cellpadding='0' cellspacing='0' style='width: 100%'>";
$display=20; // Số lượng item hiển thị
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
$sql="SELECT * FROM `contributions`";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
if ($record != 0) {
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
// END Kiểm Tra
$start=($p-1)*$display; // Tính $start dùng trong LIMIT
if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
$sql2="SELECT * FROM `contributions` order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
while ($row2=@mysql_fetch_array($query2))
{
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
                                <td><a href='./showcontri.php?id=".$row2[id]."'>".$row2[title]."</a></td>
                                <td class='action'><a target='_blank' href='./showcontri.php?id=".$row2[id]."' class='view'>Xem</a><a href='./posttest.php?contri=".$row2[uploader]."&title=".$row2[title]."&des=".$row2[content]."&cg1=".$row2[cg1]."' class='edit'>Đăng</a><a href='delcontri.php?id=".$row2[id]."' class='delete'>Xóa</a></td>
                            </tr>
";
}
echo "</table></form><br/>";
if ($page > 1) // Hiện thị thanh chuyển trang
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./testcontri.php?p=' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./testcontri.php?p=".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./testcontri.php?p=".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./testcontri.php?p=".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./testcontri.php?p=".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./testcontri.php?p=".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
else {
echo "Chưa có đóng góp nào!";
echo "</table></form><br/>";
}
require_once("footer.php");
?>