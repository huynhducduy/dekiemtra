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
document.getElementById('container').setAttribute('style', 'background: #fff;');
document.getElementById('x1').setAttribute('class', 'active');
</script>";
echo "
                    	<li style='border: 0;'></li>
                    </ul>
                </div>
                <div id='main' style='width: 100%; float: left; padding-left: 19px;'>
				<br/>
				<form action='' class='jNice'>
                    	<fieldset style='width:93%;padding: 10px;margin: 0 0 12px 0;'>
						<legend><b>&nbsp;<img src='./img/statistiques.png'>&nbsp;Thống kê&nbsp;</b></legend>
						<table style='width: 100%'>
						<tr>
						<td>Số thành viên</td>
						<td>".user_count()."</td>
						</tr>
						<tr class='odd'>
						<td>Số đề kiểm tra</td>
						<td>".test_count()."</td>
						</tr>
						<tr>
						<td>Số lượt xem</td>
						<td>".settings(view)."</td>
						</tr>
						<tr class='odd'>
						<td>Số lượt tải về</td>
						<td>".download_count()."</td>
						</tr>
						</table>
                        </fieldset>
						<fieldset style='width:93%;padding: 10px;margin: 0 0 12px 0;'>
						<legend><b>&nbsp;<img src='./img/test.png'>&nbsp;Đề kiểm tra mới nhất&nbsp;</b></legend>
						<table cellpadding='0' cellspacing='0' style='width: 100%'>";
$sql="SELECT * FROM `tests` order by `id` DESC LIMIT 0,5";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query); // Gán biến tổng số CSDL $record
if ($record != 0) {
while ($row=@mysql_fetch_array($query))
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
                                <td><a target='_blank' href='../".strtolower(str_filter($row['title'])).".".$row['id'].".php'>".cu_t($row[title],135)."</a></td>
                                <td class='action'><a target='_blank' href='../".strtolower(str_filter($row['title'])).".".$row['id'].".php' class='view'>Xem</a><a href='edittest.php?id=".$row[id]."' class='edit'>Sửa</a><a href='deltest.php?id=".$row[id]."' class='delete'>Xóa</a></td>
                            </tr>
";
}
}
else 
{ 
echo "Chưa có đề kiểm tra nào
                        "; }
echo "</table></fieldset>
						<fieldset style='width:93%;padding: 10px;margin: 0 0 12px 0;'>
						<legend><b>&nbsp;<img src='./img/utilisateur.png'>&nbsp;Thành viên mới nhất&nbsp;</b></legend>
						<table cellpadding='0' cellspacing='0' style='width: 100%'>";
$sql="SELECT * FROM `users` order by `id` DESC LIMIT 0,5";
$query=@mysql_query($sql);
$record=@mysql_num_rows($query);
if ($record == NULL) { echo "Chưa có thành viên nào"; } else {
while ($row=@mysql_fetch_array($query))
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
                                <td><a target='_blank' href='../profile.php?id=".$row[id]."'>".$row[username]."</a></td>
                                <td class='action'><a target='_blank' href='../profile.php?id=".$row[id]."' class='view'>Xem</a><a href='edituser.php?id=".$row[id]."' class='edit'>Sửa</a><a href='deluser.php?id=".$row[id]."' class='delete'>Xóa</a></td>
                            </tr>
";
}
}
echo "</table>
						</fieldset>
						<fieldset style='width:93%;padding: 10px;margin: 0 0 12px 0;'>
						<legend><b>&nbsp;<img src='./img/arrow.png'>&nbsp;Đang online&nbsp;</b></legend>
						<table cellpadding='0' cellspacing='0' style='width: 100%'>
						<tr>
						<td><b>Tên</b></td>
						<td><b>Địa chỉ IP</b></td>
						<td><b>Đang truy cập vào</b></td>
						</tr>";
while ($row=@mysql_fetch_array($queryonline))	
{
$sql2="SELECT * FROM `users` WHERE `id`=".$row[userid];
$query2=@mysql_query($sql2);
$row2=@mysql_fetch_array($query2);
$sqls="SELECT * FROM `online` where `ip`='".$row[ip]."' and `userid`='".$row[userid]."' order by `time` DESC";
$querys=@mysql_query($sqls);
$rows=@mysql_fetch_array($querys);
if ($row2[username] != NULL)
{
echo "<tr class='odd'>
<td><a href='../profile.php?id=".$row2[id]."'>".$row2['username']."</a></td>";
}
else
{
$row2[username]="Khách";
echo "<tr class='odd'>
<td>".$row2['username']."</td>";
}
echo "
<td><a target='_blank' href='http://vi.geoipseek.com/?q=".$row['ip']."'>".$row['ip']."</a></td>
<td>".$rows['local']."</td>
</tr>";
}					
echo "</table>
                        </fieldset>
                    </form>";
require_once("footer.php");
?>