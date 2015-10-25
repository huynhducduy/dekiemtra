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
if ($_GET['it'] == NULL)
{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được đề kiểm tra, hoặc có thể đề kiểm tra đã bị xóa. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
}
else
{
if ($_SESSION['userid'] != NULL)
{
$sql="SELECT * FROM `tests` where `id`='".$_GET['it']."'";
$query=@mysql_query($sql);
if(@mysql_num_rows($query) == NULL)
	{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Không xác định được đề kiểm tra, hoặc có thể đề kiểm tra đã bị xóa. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else
	{
	$row=@mysql_fetch_array($query);
	if ($row[rt] == 0)
	{
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_red'>Đề kiểm tra này vẫn chưa hỗ trợ làm thử trực tuyến. Nếu bạn cho rằng đây là một lỗi bạn có thể liên hệ với quản trị viên!</p>";
	}
	else 
	{
	$x=$_SERVER['REQUEST_URI'];
	$kt="/".strtolower(str_filter($row[title])).".".$row[id].".test";
	if ($x != $kt) { header("refresh: 0; url=".$kt."" ); }
	$title="Làm thử đề kiểm tra";
	$description="Làm thử đề kiểm tra ".$row[description];
	$keyword="Làm thử đề kiểm tra,lam thu de kiem tra,làm thử,lam thu,thử làm đề kiểm tra,thu lam de kiem tra,".$row[keyword];
	$title2=$row[title];
	$link2=strtolower(str_filter($row[title])).".".$_GET['it'].".php";
	$sql="SELECT * FROM `tests` where `id`='".$_GET['it']."'";
	$query=@mysql_query($sql);
	$row=@mysql_fetch_array($query);
	$sql1="SELECT * FROM `cate1` where `id`='".$row[id1]."'";
	$query1=@mysql_query($sql1);
	$row1=@mysql_fetch_array($query1);
	$sql2="SELECT * FROM `cate2` where `id`='".$row1[id2]."'";
	$query2=@mysql_query($sql2);
	$row2=@mysql_fetch_array($query2);
	$this3=$row2[id3];
	$view=$row[view]+1;
	$sqlview="update `tests` set `view`='".$view."' where `id`='".$_GET['it']."'";
	$queryview=@mysql_query($sqlview);
	require_once("header.php");
	$sql="SELECT * FROM `tests` where `id`='".$_GET['it']."'";
	$query=@mysql_query($sql);
	$row=@mysql_fetch_array($query);
	echo "<center><p><h1><i>Làm thử đề kiểm tra</i><br/>".$row[title]."</h1></p></center>
	<form name='cd' class='nothidden2'>
	<div id='timer'>
	<div class='timer'>
	<p style='margin-top:95px; font-size: 1.3em; color: #fff !important;' id='timerText'>
	<input readonly style='border: 0; width: 70%; font-weight: bold; font-size: 115%; border-radius:3px; padding-top: 1px; text-align: center;' name='disp' value='".$row[time2].":00'/></b>
	</p>
	</div>
	</div>
	</form>
	<div class='time'>".ti_me($row[time])."</div>
	<div class='finish'>".$row[fnum]."</div>
	<form action='' method='post' class='nothidden'>
	<center><p><input type='submit' name='start' class='button' value='Bắt đầu làm'/></p></center>
	<br/>
	</form>";
	if(isset($_POST["start"]))
	{
	$timee=time();
	?>
	<script language="JavaScript" type="text/javascript" >
	$(".nothidden").addClass('hidden');
	setTimeout("notExit()",<?php echo $row[time2]; ?>*60000+5000);
	setTimeout("document.test.submit()",<?php echo $row[time2]; ?>*60000+5000);
	window.onbeforeunload = function (e) {
		e = e || window.event;
		var msg = "Bạn đang trong một bài kiểm tra thử!";
		// For IE and Firefox
		if (e) {
			e.returnValue = msg;
		}
		// For Safari
		return msg;
	}
	function notExit()
	{
	window.onbeforeunload = 0;
	}
	var mins
	var secs;
	function cd() {
		mins = 1 * m("<?php echo $row[time2]; ?>"); // change minutes here
		secs = 0 + s(":01"); // change seconds here
		redo();
	}
	function m(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
			break;
		}
		return(obj.substring(0, i));
	}
	function s(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
			break;
		}
		return(obj.substring(i + 1, obj.length));
	}
	function dis(mins,secs) {
		var disp;
		if(mins <= 9) {
			disp = "0";
		} else {
			disp = "";
		}
		disp += mins + ":";
		if(secs <= 9) {
			disp += "0" + secs;
		} else {
			disp += secs;
		}
		return(disp);
	}
	function redo() {
		secs--;
		if(secs == -1) {
			secs = 59;
			mins--;
		}
		document.cd.disp.value = dis(mins,secs); // setup additional displays here.
		if((mins == 0) && (secs == 0)) { 
	document.cd.disp.value = "Hết giờ";
		} else {
			cd = setTimeout("redo()",1000);
		}
	}
	function init() {
	cd();
	}
	init();
	</script>
	<?php
	echo "<br/><form action='' name='test' method='post'>";
	$sqlques="SELECT * FROM `ques_parts` where `it`='".$_GET['it']."'";
	$queryques=@mysql_query($sqlques);
	$i=0;
	while ($rowques=@mysql_fetch_array($queryques))
	{
		$i++;
		if ($rowques[answer] != NULL)
		{
			$answer=preg_replace("/<p>/","",$rowques[answer]);
			$answer=preg_replace("/<\/p>/","",$answer);
			$ques=preg_replace("/<p>/","",$rowques[content]);
			$ques=preg_replace("/<\/p>/","",$ques);
			$y=explode('|-|',$answer);
			echo "
			<h3 style='margin-bottom: 3px;'><span class='Statistics' style='font-style: normal;'>".$i."</span>&nbsp;".$ques."</h3><table>";
			$j=0;
			$k=0;
			while (isset($y[$j])) 
			{
				$k++;
				echo "<tr><td><p><input name='ans".$i."' type='radio' value='".$k."'></p></td><td><p>".$y[$j]."</p></td></tr>"; 
				$j++;
			}
			echo "</table>";
		}
		else
		{
			$ques=preg_replace("/<p>/","",$rowques[content]);
			$ques=preg_replace("/<\/p>/","",$ques);
			echo "<h3 style='margin-bottom: 3px;'><span class='Statistics' style='font-style: normal;'>".$i."</span>&nbsp;".$ques."</h3>
			<p><textarea name='ans".$i."' type='text' class='ckeditor'></textarea></p>";
		}
	}
	echo "<input type='hidden' name='timee' value='".$timee."'>
	<p style='float: left;'><input type='submit' name='finish' class='button' value='Nộp Bài' onclick='notExit()'/></p><p style='float: right;'><input type='submit' name='not' class='button' value='Hủy không làm bài' onclick='notExit()'/></p>
	</form><br/><br/><br/>";
	}
	if ((isset($_POST["timee"])) || (isset($_POST["finish"])))
	{
		$fnum=$row[fnum]+1;
		$sqlfnum="update `tests` set `fnum`='".$fnum."' where `id`='".$_GET['it']."'";
		$queryfnum=@mysql_query($sqlfnum);
		finish();
		?>
		<script>
		$(".nothidden").addClass('hidden');
		$(".nothidden2").addClass('hidden');
		</script>
		<?php
	}
	if(isset($_POST["not"]))
	{
		header("refresh: 2; url=".$link2."" );
	}
	}
}
}
else {
$title="Có lỗi";
$description="Có lỗi";
$keyword="Có lỗi,lỗi,co loi,loi";
require_once("header.php");
echo "<p class='message_yellow'>Bạn phải đăng nhập để làm thử đề kiểm tra!</p>";
}
}
require_once("footer.php");
?>