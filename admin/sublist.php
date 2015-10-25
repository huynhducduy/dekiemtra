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
document.getElementById('x2').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='basic.php'>Thiết lập cơ bản</a></li>
                    	<li><a href='admininfo.php'>Thông tin quản trị viên</a></li>
                    	<li><a href='social.php'>Mạng xã hội</a></li>
                    	<li><a href='ads.php'>Quảng cáo</a></li>
                    	<li><a href='sublist.php' class='active'>Đăng ký nhận đề mới</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Đăng ký nhận đề mới</a></h2>
                <div id='main'>
				<br/>
				<form action='' class='jNice' method='post'>
				<table cellpadding='0' cellspacing='0'>";
$display=20; // Số lượng item hiển thị
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
$sql="SELECT * FROM `subs`";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
if ($record != 0) {
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
// END Kiểm Tra
$start=($p-1)*$display; // Tính $start dùng trong LIMIT
if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
$sql2="SELECT * FROM `subs` order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
$i=0;
while ($row2=@mysql_fetch_array($query2))
{
$i++;
if ($i == 2) { echo "<tr class='odd'>"; $i=0; } else { echo "<tr>"; }
echo "                              <td>".$row2['email']."</td>
                                <td class='action'><a href='./editsub.php?id=".$row2['id']."' class='edit'>Chỉnh sửa</a><a href='./delsub.php?id=".$row2['id']."' class='delete'>Xóa</a></td>
                            </tr>";
}							
echo "
                </table>
						<br/>
                    </form>";
if ($page > 1) // Hiện thị thanh chuyển trang
{
echo "<ul class='pagination' align='center'>";
$prev=$p-1;
$next=$p+1;
	if ($p-1 > 1)
	{
		echo "<li><b><a href='./sublist.php?p=' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./sublist.php?p=".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./sublist.php?p=".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./sublist.php?p=".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./sublist.php?p=".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./sublist.php?p=".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
else {
echo "Chưa có đăng ký nào";
echo "
                </table>
						<br/>
                    </form>";
}
echo "<br/>";
require_once("footer.php");
?>