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
document.getElementById('x3').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='categorylist.php' class='active'>Cây danh mục</a></li>
                    </ul>
                </div>
                <h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Cây danh mục</a></h2>
                <div id='main'>
				<br/>
				<style>
				#main table tr td {
				line-height: 20px !important;
				height: 20px !important;
				}
				</style>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>";
$sql="SELECT * FROM `cate3`"; 
$query=@mysql_query($sql);
$num=@mysql_num_rows($query);
$z=0;
while($row=@mysql_fetch_array($query))
{
$z++;
	echo "
	<table>
	<tbody>
	<tr style='border-bottom: 0 !important;' class='odx'>
	<td width='68%' style='padding-top: 5px;'>
	<a href='./".strtolower(str_filter($row[title])).".".$row[id]."'><span style='font-weight:bold;white-space:normal;'><img src='img/lv3.png' alt='Category_' title='Category'>&nbsp;".$row[title]."</span></a>
	</td>
	<!--<td class='action'><a href='addcate.php?cg3=".$row[id]."' class='view'>Thêm</a><a href='editcate.php?cg3=".$row[id]."' class='edit'>Sửa</a><a href='delcate.php?cg3=".$row[id]."' class='delete'>Xóa</a></td>-->
	</tr>
	</tbody>
	</table>";
	$sql2="SELECT * FROM `cate2` where `id3`='".$row[id]."'"; 
		$query2=@mysql_query($sql2); 
		$num2=@mysql_num_rows($query2);
		$j=0;
		while($row2=@mysql_fetch_array($query2))
		{
		$j++;
		echo "
		<table>
		<tbody>
		<tr style='border-bottom: 0 !important;'>
		<td width='68%'>
		<span style='white-space:nowrap'>";
		if ($j != $num2) {
		echo "<img src='img/indent_middle.gif' style='padding-top: 5px;'>"; }
		else {
		echo "<img src='img/indent_end.gif' style='padding-top: 5px;'>"; }
		echo "</span>
		<a href='./".strtolower(str_filter($row[title]))."/".strtolower(str_filter($row2[title])).".".$row2[id]."'><span style='font-weight:bold'><img src='img/lv2.png' alt='Category' title='Category'>&nbsp;".$row2[title]."</span></a>
		</td>
		<!--<td class='action'><a href='addcate.php?cg2=".$row2[id]."' class='view'>Thêm</a><a href='editcate.php?cg2=".$row2[id]."' class='edit'>Sửa</a><a href='delcate.php?cg2=".$row2[id]."' class='delete'>Xóa</a></td>-->
		</tr>
		</tbody>
		</table>";
			$sql3="SELECT * FROM `cate1` where `id2`='".$row2[id]."'"; 
					$query3=@mysql_query($sql3); 
					$num3=@mysql_num_rows($query3);
					$i=0;
					while($row3=@mysql_fetch_array($query3))
					{
					$i++;
			echo "
			<table>
			<tbody>";
			if (($j == $num2) && ($i == $num3) && ($z == $num)) {
			echo "<tr class='odd'>"; }
			else {
			echo "<tr style='border-bottom: 0 !important;' class='odd'>"; }
			echo "
			<td width='68%'>
				<span style='white-space:nowrap'>";
				if ($j != $num2) {
				echo "
				<img src='img/indent_line.gif' style='padding-top: 5px;'>&nbsp;&nbsp;"; }
				else {
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
				if ($i != $num3) { 
				echo "
				<img src='img/indent_middle.gif' style='padding-top: 5px;'>"; }
				else {
				echo "
				<img src='img/indent_end.gif' style='padding-top: 5px;'>"; }
				echo "
				</span>
				<a href='./".strtolower(str_filter($row[title]))."/".strtolower(str_filter($row2[title]))."/".strtolower(str_filter($row3[title])).".".$row3[id]."'>
				<span><img src='img/lv1.png' alt='Diễn Đàn' title='Diễn Đàn' >&nbsp;".$row3[title]."</span>
				</a>
			</td>
			<!--<td class='action'><a href='addcate.php?cg1=".$row3[id]."' class='view'>Thêm</a><a href='editcate.php?cg1=".$row3[id]."' class='edit'>Sửa</a><a href='delcate.php?cg1=".$row3[id]."' class='delete'>Xóa</a></td>-->
			</tr>
			</tbody>
			</table>";		
			}
		}
}
					echo "</form>
					<br/>";
require_once("footer.php");
?>