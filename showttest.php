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
if ($_GET['tid'] == NULL)
{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được báo cáo bài làm thử, hoặc báo cáo đã bị xóa. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
}
else
{
$sql="SELECT * FROM `test_history` where `id`='".$_GET['tid']."'";
$query=@mysql_query($sql);
if(@mysql_num_rows($query) == NULL)
	{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được báo cáo bài làm thử, hoặc báo cáo đã bị xóa. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else
	{
	$row=@mysql_fetch_array($query);
			// Lấy test
	$sql1="SELECT * FROM `tests` where `id`='".$row[it]."'";
	$query1=@mysql_query($sql1);
	$row1=@mysql_fetch_array($query1);
	$it=$row[it];
	$x=$_SERVER['REQUEST_URI'];
	$kt="/bao-cao-lam-thu/".strtolower(str_filter(account($row[uid],username)))."/".strtolower(str_filter($row1[title]))."-".$_GET['tid']."";
	if (($x != $kt))
	{
		header("refresh: 0; url=".$kt."" );
	}
$title="Báo cáo bài làm thử của ".account($row[uid],username).": ".$row1[title];
$description=$row[description];
$keyword=$row[keyword];
require_once("header.php");
$sqlt="SELECT * FROM `tests` where `id`='".$it."'";
$queryt=@mysql_query($sqlt);
$rowt=@mysql_fetch_array($queryt);
$sql="SELECT * FROM `test_history` where `id`='".$_GET['tid']."'";
$query=@mysql_query($sql);
$row=@mysql_fetch_array($query);
echo "<center><p><h1><i>Báo cáo làm thử đề kiểm tra của </i><a href='thong-tin-thanh-vien-".strtolower(str_filter(account($row[uid],username)))."-".$row[uid]."'><span class='Statistics' style='font-style: normal;'>".account($row[uid],username)."</span></a><br/><a href='./".strtolower(str_filter($row1['title'])).".".$row1['id'].".php'>".$row1[title]."</a></h1></p></center>
<div class='time'>".ti_me($row[time])."</div>";
$sqlques="SELECT * FROM `ques_parts` where `it`='".$it."'";
$queryques=@mysql_query($sqlques);
while ($rowques=@mysql_fetch_array($queryques))
{ $score2=$score2+$rowques[score]; }
echo "<h4 style='font-style: normal;'>Điểm: ".$row[score]."/".$score2."</h4>";
echo "<h4 style='font-style: normal;'>Thời gian làm bài: ".$row[comp]." phút/".$row1[time2]." phút</h4>";
$sqlques2="SELECT * FROM `ques_history` where `tid`='".$_GET['tid']."'";
$queryques2=@mysql_query($sqlques2);
$d=0;
while ($rowques2=@mysql_fetch_array($queryques2))
{
$d++;
echo "<fieldset class='fieldset' id='".$d."'>";
	$sqlques3="SELECT * FROM `ques_parts` where `id`='".$rowques2[qid]."'";
	$queryques3=@mysql_query($sqlques3);
	$rowques3=@mysql_fetch_array($queryques3);
	$ques=preg_replace("/<p>/","",$rowques3[content]);
	$ques=preg_replace("/<\/p>/","",$ques);
	echo "<p>
	<h3 style='margin-bottom: 5px;'><span class='Statistics' style='font-style: normal;'>".$d."</span>&nbsp;".$ques." <b style='font-style: normal; color: #004574'>&nbsp;(".$rowques3[score]."đ)</b></h3><table border='0'>";
	if ($rowques3[answer] != NULL)
	{
	$y=explode('|-|',$rowques3[answer]);
	$j=0;
	$k=0;
	while (isset($y[$j])) {
	$k++;
	if (($k == $rowques2[content]) && ($rowques2[tf] == 1)) 
	{ 
	echo "<tr><td><img width='17px' src='../images/green-tick.png'/ title='Đáp án đã chọn là đúng' alt='Đáp án đã chọn là đúng'></td><td><p>".$y[$j]."</p></td></tr>";
	?>
	<script>
	$("#<?php echo $d; ?>").addClass('true');
	</script>
	<?php
	}
	else
	{
	if ($k == $rowques3[tf]) {
	echo "<tr><td><img width='17px' src='../images/green-tick.png' title='Đáp án đúng' alt='Đáp án đúng'/></td><td><p>".$y[$j]."</p></td></tr>";
	} else
	if ($k == $rowques2[content]) {
	echo "<tr><td><img width='15px' src='../images/redx.png' title='Đáp án đã chọn là sai' alt='Đáp án đã chọn là sai'/></td><td><p>".$y[$j]."</p></td></tr>";
	?>
	<script>
	$("#<?php echo $d; ?>").addClass('false');
	</script>
	<?php
	} else {echo "<tr><td style='padding-top: 20px;'></td><td><p>".$y[$j]."</p></td></tr>";}
	if ($rowques2[content] == 0) {
	?>
	<script>
	$("#<?php echo $d; ?>").addClass('false');
	</script>
	<?php	
	}
	}
	$j++;
	}
	}
	else
	{
	echo "<p>".$rowques2[content]."</p>";
	}
	echo"
	</table></p>
	";
	echo "</fieldset>";
}
?>
<div class="clear"></div>
</div>
</div>
<div id="maincontent">
<div id="placecontentin" name='cmt'>
<h2>Bình luận</h2>
<?php
if ($_SESSION["userid"] != NULL)
{
echo "<form action='' method='POST' name ='comment'>
<textarea name='comment' type='text' class='ckeditor'></textarea>
<input type='hidden' name='tid' value='".$_GET['tid']."'>
<input type='submit' name='cmt' class='button' value='Bình luận' style='float: right'>
</form>
<br/><br/>";
}
else 
{
echo"<p><a href='dang-nhap?goto=".$_SERVER['REQUEST_URI']."'>Đăng nhập</a> để bình luận, hoặc bạn có thể bình luận bằng tài khoản facebook ở phần bên dưới!</p>";
}
?>
<br/>
<?php
if (isset($_POST['cmt']))
{
cmt_tid();
}
$sqlcmt="SELECT * FROM `comments` where `tid`=".$_GET['tid']." order by `liked` DESC";
$querycmt=@mysql_query($sqlcmt);
if (@mysql_num_rows($querycmt) == 0)
{
echo "<center><p>Chưa có bình luận nào, hãy là người đầu tiên bình luận về điều này!</p></center>";
}
else {
echo "<p id='login-to-cmt' style='display: none; font-size: 1.5em;text-align: center;'>
Đăng nhập để thích bình luận này!<br/>
<a href='dang-nhap?goto=".$_SERVER['REQUEST_URI']."'><button class='button' style='float: right'>Đăng nhập</button></a>
</p>";
while ($rowcmt=@mysql_fetch_array($querycmt))
{
if ($_SESSION["userid"] != NULL)
{
$y=explode(',',$rowcmt[uid_liked]);
$kt=2;
foreach ($y as $id2)
{
if ($id2 == $_SESSION["userid"])
	{
	$kt=1;
	}
}
}
else
{
$kt=3;
}
echo "
<table style='margin-bottom: 3px;'>
<tr><td valign='top' class='cmtAvatar'>
<a href='thong-tin-thanh-vien-".strtolower(str_filter(account($rowcmt[uid],username)))."-".$rowcmt[uid]."'>";
if (account($rowcmt[uid],avatar) == NULL)
{
$ava="./images/noavatar.jpg";
}
else
{
$ava=account($rowcmt[uid],avatar);
}
echo "
<img src='".$ava."' width='52' height='52' class='img3'/></a>
</td>
<td width='100%'>
<div class='cmtContent'>
<div class='cmtHeader'>
<a href='thong-tin-thanh-vien-".strtolower(str_filter(account($rowcmt[uid],username)))."-".$rowcmt[uid]."'>
".account($rowcmt[uid],username)."</a>
<span class='cmtTime'>".ti_me($rowcmt[time])."</span>
</div>
<p>".$rowcmt[content]."</p>
<div class='cmtFooter'>";
if ($kt == 3)
{
echo "<a href='?lightbox[width]=*&lightbox[height]=*#login-to-cmt' class='cmtLike lightbox'>Thích</a>";
} else if ($kt == 2)
{
echo "<a href='uplike.php?id=".$rowcmt[id]."&lightbox[iframe]=true&lightbox[width]=330&lightbox[height]=60' class='cmtLike lightbox'>Thích</a>";
}
else if ($kt ==1)
{
echo "<a href='unlike.php?id=".$rowcmt[id]."&lightbox[iframe]=true&lightbox[width]=330&lightbox[height]=60' class='cmtLike cmtLiked lightbox'>Bỏ thích</a>";
}
echo "
&nbsp;Có ".$rowcmt[liked]." người thích điều này<rr/>
</div></p>
</div></td></tr>
</table>
";
}
}
?>
<div class="clear"></div>
</div>
</div>
<div id="maincontent_last">
<div id="placecontentin">
<h2>Bình luận bằng Facebook</h2>
<div class='fb-comments' data-href='<?php echo settings(url).$_SERVER['REQUEST_URI']; ?>' data-width='626' data-num-posts='5'></div>
<?php
}
}
require_once("footer.php");
?>