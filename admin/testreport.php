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
echo "
                    	<li><a href='testlist.php'>Danh sách đề kiểm tra</a></li>
                    	<li><a href='posttest.php'>Đăng đề kiểm tra</a></li>
						<li><a href='testreport.php' class='active'>Báo cáo đề kiểm tra</a></li>
						<li><a href='testcontri.php'>Đóng góp đề kiểm tra</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Báo cáo đề kiểm tra</a></h2>
                <div id='main'>
				<br/>
				<form action='' class='jNice' method='post'>
				<table cellpadding='0' cellspacing='0'>";
$display=20; // Số lượng item hiển thị
if (isset($_GET['p']) && (INT)($_GET['p'])) {$p=$_GET['p'];} else {$p=1;} // Kiểm Tra Trang Cần Hiển Thị $p
$sql="SELECT * FROM `reports`";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
if ($record != 0) {
// Kiểm tra trang cần hiển thị có hợp lệ hay không
if ($p > ceil($record/$display)) {$p=1;}
if ($p <= 0) {$p=1;}
// END Kiểm Tra
$start=($p-1)*$display; // Tính $start dùng trong LIMIT
if ($record > $display) { $page=ceil($record/$display); } else { $page=1; } // Kiểm tra và gán biến tổng số trang $page
$sql2="SELECT * FROM `reports` order by `id` DESC LIMIT ".$start.",".$display; // Lấy CSDL
$query2=@mysql_query($sql2); // Lấy CSDL
$i=0;
while ($row2=@mysql_fetch_array($query2))
{
$i++;
if ($i == 2) { echo "<tr class='odd'>"; $i=0; } else { echo "<tr>"; }
echo "<td>";
switch ($row2['error'])
{
case 1:
echo "Sai danh mục";
break;
case 2:
echo "Nội dung, tên đề kiểm tra có sai sót";
break;
case 3:
echo "Không xem được đề kiểm tra";
break;
case 4:
echo "Không download được đề kiểm tra";
break;
case 5:
echo "Khác";
}
if ($row2['note'] != NULL) {
echo ": ".$row2['note'];
}
$sql3="SELECT * FROM `tests` where `id`='".$row2['testid']."'";
$query3=@mysql_query($sql3);
$row3=@mysql_fetch_array($query3);
echo "                              </td>
                                <td class='action'><a href='../".strtolower(str_filter($row3['title'])).".".$row3['id'].".php' class='view'>Xem</a><a href='./edittest.php?id=".$row2['testid']."' class='edit'>Sửa lỗi</a><a href='./delreport.php?id=".$row2['id']."' class='delete'>Xóa</a></td>
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
		echo "<li><b><a href='./testreport.php?p=' title='Trang đầu tiên - 1'>&laquo;</a></b></li>&nbsp;";
	} 
	if ($p > 1)
	{ 
		echo "<li><b><a href='./testreport?p=".$prev."' title='Trang trước - ".$prev."' alt='Trang trước - ".$prev."'><font face='arial'>◄</font></a></b></li>&nbsp;";
		echo "<li><b><a href='./testreport?p=".$prev."' title='Trang ".$prev."' alt='Trang ".$prev."'>".$prev."</a></b></li>&nbsp;";
	}
	echo "<li><b><a title='Trang hiện tại' alt='Trang hiện tại' class='current'>".$p."</a></b></li>&nbsp;";
	if ($p < $page)
	{
		echo "<li><b><a href='./testreport?p=".$next."' title='Trang ".$next."' alt='Trang ".$next."'>".$next."</a></b></li>&nbsp;";
		echo "<li><b><a href='./testreport?p=".$next."' title='Trang sau - ".$next."' alt='Trang sau - ".$next."'><font face='arial'>►</font></a></b></li>&nbsp;";
	}
	if ($p+1 < $page)
	{
		echo "<li><b><a href='./testreport?p=".$page."' title='Trang cuối cùng - ".$page."' alt='Trang cuối cùng - ".$page."'>&raquo;</a></b></li>";
	}
echo "</ul>";
}
}
else {
echo "Chưa có báo cáo nào";
echo "
                </table>
						<br/>
                    </form>";
}
echo "<br/>";
require_once("footer.php");
?>