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
	$x=$_SERVER['REQUEST_URI'];
	$kt="/".strtolower(str_filter($row[title])).".".$row[id].".php";
	if ($x != $kt) { header("refresh: 0; url=".$kt."" ); }
		// Lấy cate1
	$sql1="SELECT * FROM `cate1` where `id`='".$row[id1]."'";
	$query1=@mysql_query($sql1);
	$row1=@mysql_fetch_array($query1);
		// Lấy cate2
	$sql2="SELECT * FROM `cate2` where `id`='".$row1[id2]."'";
	$query2=@mysql_query($sql2);
	$row2=@mysql_fetch_array($query2);
		// Lấy cate3
	$sql3="SELECT * FROM `cate3` where `id`='".$row2[id3]."'";
	$query3=@mysql_query($sql3);
	$row3=@mysql_fetch_array($query3);
$this3=$row2[id3];
$title=$row[title];
$description=$row[description];
$keyword=$row[keyword];
$title2=$row1[title];
$link2=strtolower(str_filter($row3[title]))."/".strtolower(str_filter($row2[title]))."/".strtolower(str_filter($row1[title])).".".$row1[id];
$title3=$row2[title];
$link3=strtolower(str_filter($row3[title]))."/".strtolower(str_filter($row2[title])).".".$row2[id];
$title4=$row3[title];
$link4=strtolower(str_filter($row3[title])).".".$row3[id];
require_once("header.php");
$sql="SELECT * FROM `tests` where `id`='".$_GET['it']."'";
$query=@mysql_query($sql);
$row=@mysql_fetch_array($query);
$view=$row[view]+1;
$sqlview="update `tests` set `view`='".$view."' where `id`='".$_GET['it']."'";
$queryview=@mysql_query($sqlview);
echo "<center><p><h1>".$row[title]."</h1></p></center>";
?>
<script type="text/javascript">
 $(function(){
    $('#form_close1').click(function(){
        $('#form1').fadeOut()
        $('#overlay').hide()
    })
    $('#report').click(function(){
        $('#overlay').show()
        $('#form1').fadeIn()
    })
    center_form();$(window).resize(function(){center_form()})
    function center_form(){
        var $wid=$(window).width()
        var $hei=$(window).height()
        $('#form1').each(function(){
            $(this).css({'left':($wid-$(this).width())/2,'top':($hei-$(this).height())/2})
        })
    }
 })
</script>
<div id="form1" style="font-size: 12px; width='400px'">
        <h3>Báo lỗi</h3>
        <div>   
		<span id="form_content1">
            <form method="post" action="">
<table style="text-align: -webkit-center;">
<tr><td><p>Lỗi</p></td><td><p><select name='error' class='textbox' cols="40" style="width: 355px;" required/>
<option value='1'>Sai danh mục</option>
<option value='2'>Nội dung, tên đề kiểm tra có sai sót</option>
<option value='3'>Không xem được đề kiểm tra</option>
<option value='4'>Không download được đề kiểm tra</option>
<option value='5'>Khác (ghi rõ)</option>
<br/></p></td></tr>
<tr><td colspan="2"><p><textarea name='note' type='text' value='' class='textbox' rows="3" cols="48" placeholder="Ghi chú"></textarea><br/></p></td></tr>
<tr><td colspan="2"><p><input type='hidden' name='testid' value='<?php echo $row[id];?>'/><input type='submit' name='send' class='button3' value='Gửi' style="float: right;"/><br/></p></td></tr>
</table>
            </form>
			</span>
        </div>
<span id="form_close1"></span>
</div>
<?php
if (isset($_POST['send']))
{
report();
}
?>
<div class="time"><?php echo ti_me($row[time]); ?></div>
<div class="view"><?php echo $row[view]; ?></div>
<?php
if ($_SESSION["userid"] != NULL)
{
$y=explode(',',$row[uid_liked]);
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
echo "<p id='login-to-like' style='display: none; font-size: 1.5em;text-align: center;'>
Đăng nhập để thích đề kiểm tra này!<br/>
<a href='dang-nhap?goto=".$_SERVER['REQUEST_URI']."'><button class='button' style='float: right'>Đăng nhập</button></a>
</p>";
if ($kt == 3)
{
echo "<div class='like' style='padding: 3px 2px 3px 2px !important;'><a href='?lightbox[width]=*&lightbox[height]=*#login-to-like' class='cmtLike lightbox'>".$row[liked]."</a></div>";
} else if ($kt == 2)
{
echo "<form action='' method='POST'>
<div class='like'><input type='submit' name='uplike1' id='uplike1' class='cmtLike' style='float: right' value='".$row[liked]."' /></div>
</form>";
if (isset($_POST[uplike1]))
{
like_up1();
?>
<script>
$("#uplike1").addClass('cmtLiked');
$('#uplike1').attr('value','<?php echo $row[liked]+1; ?>');
$('#uplike1').attr('type','button');
</script>
<?php
}
}
else if ($kt ==1)
{
echo "<form action='' method='POST'>
<div class='like'><input type='submit' name='downlike1' id='downlike1' class='cmtLike cmtLiked' style='float: right' value='".$row[liked]."' /></div>
</form>";
if (isset($_POST[downlike1]))
{
like_down1();
?>
<script>
$("#downlike1").removeClass('cmtLiked');
$('#downlike1').attr('value','<?php echo $row[liked]-1; ?>');
$('#downlike1').attr('type','button');
</script>
<?php
}
}

?>
<div class="report" id="report">Báo lỗi</div>
<div class="slidebox" align="center">
<div class="fb-like" data-href="<?php echo settings("url").$_SERVER['REQUEST_URI']; ?>" data-layout="box_count" data-show-faces="false" data-send="false"></div><br/><br/>
<div class="g-plusone" data-size="tall"></div><br/><br/>
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="vertical" data-via="Đề Kiểm Tra">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<p><?php echo $row[description]; ?></p>
<p align='right'><span style="padding-left: 20px; background: #fff url(./images/handshake.png) no-repeat 0 0;">Đóng góp bởi
<?php 
if ($row[contribution] != 0) 
{ 
echo "<a href='./thong-tin-thanh-vien-".strtolower(str_filter(account($row[contribution],username)))."-".$row[contribution]."'>".account($row[contribution],username)."</a>"; 
} 
else 
{ 
echo "<a>Ban Quản Trị</a>"; 
}
?>
</span></p>
<h2>Đề kiểm tra</h2>
<?php
$sqltest="SELECT * FROM `test_parts` where `it`='".$_GET['it']."'";
$querytest=@mysql_query($sqltest);
if(@mysql_num_rows($querytest) == NULL)
	{
	echo "<p>Chưa có!</p>";
	}
	else
	{
	$rowtest=@mysql_fetch_array($querytest);
	echo "<iframe src='https://docs.google.com/file/d/".$rowtest[gdocid]."/preview' class='docs'></iframe>";
	}
?>
<h2>Đáp án</h2>
<?php
$sqlans="SELECT * FROM `answer_parts` where `it`='".$_GET['it']."'";
$queryans=@mysql_query($sqlans);
if(@mysql_num_rows($queryans) == NULL)
	{
	echo "<p>Chưa có!</p>";
	}
	else
	{
	$rowans=@mysql_fetch_array($queryans);
	echo "<iframe src='https://docs.google.com/file/d/".$rowans[gdocid]."/preview' class='docs'></iframe>";	
	}
?>
<div class="download">
<h2>Download</h2>
<h4>Đề kiểm tra</h4><li style="list-style: none;" class='download2'>
<?php 
if(@mysql_num_rows($querytest) == NULL)
{
echo "<p>Chưa có!</p>";
}
else
{
if ($_SESSION['userid'] != NULL)
{
echo "<p><a href='./download.php?t=test&i=".$row[id]."&l=docs.google.com/uc?id=".$rowtest[gdocid]."&export=download'>Tải về</a>&nbsp;(".$rowtest[download]." lần tải)</p>";
}
else
{
echo"<p><a href='dang-nhap?goto=".$_SERVER['REQUEST_URI']."'>Đăng nhập</a> để tải xuống</p>";
}
}
?>
</li>
<h4>Đáp án</h4><li style="list-style: none;" class='download2'>
<?php 
if(@mysql_num_rows($queryans) == NULL)
{
echo "<p>Chưa có!</p>";
}
else
{
if ($_SESSION['userid'] != NULL)
{
echo "<p><a href='./download.php?t=ans&i=".$row[id]."&l=docs.google.com/uc?id=".$rowans[gdocid]."'&export=download>Tải về</a>&nbsp;(".$rowans[download]." lần tải)</p>";
}
else
{
echo"<p><a href='dang-nhap?goto=".$_SERVER['REQUEST_URI']."'>Đăng nhập</a> để tải xuống</p>";
}
}
?>
</li>
</div>
<br/>
<h2>Làm thử bài kiểm tra</h2>
<p>Chỉ hỗ trợ chấm điểm cho phần trắc nghiệm có đáp án, không hỗ trợ phần tự luận</p>
<?php
if ($row[rt] != 0)
{
if ($_SESSION['userid'] != NULL)
{
echo "
<a href='".strtolower(str_filter($row[title])).".".$row[id].".test"."' style='float: left;'><button class='button'>Làm thử</button><a>
<a href='/danh-sach-bao-cao-lam-thu-s/".strtolower(str_filter($row[title]))."-".$row[id]."' style='float: right;'><button class='button'>Danh sách báo cáo làm thử</button><a>
<br/>
<br/>
<br/>";
} else { echo"<p><a href='dang-nhap?goto=".$_SERVER['REQUEST_URI']."'>Đăng nhập</a> để làm thử đề kiểm tra</p><Br/>"; }
} else { echo"<p class='message_red'>Chưa hỗ trợ làm thử cho đề kiểm tra này</p><Br/>"; }
?>
<div class="tag_list"><b>Tags:</b>
<?php
$x = explode(',',$row[keyword]);
$i=0;
foreach($x as $y) {
$i++;
if ($i == 1)
{
echo "<a href='http://www.google.com/cse?cx=".settings(gcseid)."&ie=UTF-8&q=".$y."' target='_blank'>".$y."</a>";
}
else
{
echo ",<a href='http://www.google.com/cse?cx=".settings(gcseid)."&ie=UTF-8&q=".$y."' target='_blank'>".$y."</a>";
}
}
?>
</div>
<div class="clear"></div>
</div>
</div>
<div id="maincontent">
<div id="placecontentin">
<h2>Có thể bạn quan tâm</h2>
<table>
<tr>
<?php
for($i=1; $i<=12; $i++)
{
$s=$row[id]-$i;
$sqls="SELECT * FROM `tests` where `id`='".$s."'";
$querys=mysql_query($sqls);
if (@mysql_num_rows($querys) != NULL)
{
$rows=mysql_fetch_array($querys);
/* echo"
<li><p>&raquo; <a href='./".strtolower(str_filter($rows['title'])).".".$rows['id'].".php' title='".$rows[title]."'>".$rows[title]."</a><span class='date'> (".ti_me($rows[time]).")</span></p></li>";
*/
echo "<th><div style='
border: 1px solid #efefef;
border-radius: 1px;
-webkit-border-radius: 1px;
-moz-border-radius: 1px;
width: 74px;
background-color: #fff;
box-shadow: 0 2px 5px rgba(0,0,0,.16);
-moz-box-shadow: 0 2px 5px rgba(0,0,0,.16);
-webkit-box-shadow: 0px 2px 5px rgba(0,0,0,.16);
padding: 10px;
margin-bottom: 10px;
margin-right: 10px;'>
<a href='./".strtolower(str_filter($rows['title'])).".".$rows['id'].".php'><img src='".$rows[thumb]."' alt='".$rows[title]."' title='".$rows[title]."' width='74' height='74'></a>
<a href='./".strtolower(str_filter($rows['title'])).".".$rows['id'].".php'>".$rows[title]."</a></th></div>";
if ($i == 6) { echo "<tr/><tr>"; }
}
}
?>
</tr></table>
<div class="clear"></div>
</div>
</div>
<div id="maincontent">
<div id="placecontentin">
<h2>Bình luận</h2>
<?php
if ($_SESSION["userid"] != NULL)
{
echo "<form action='' method='POST' name ='comment'>
<textarea name='comment' type='text' class='ckeditor'></textarea>
<input type='hidden' name='it' value='".$_GET['it']."'>
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
cmt_it();
}
$sqlcmt="SELECT * FROM `comments` where `it`=".$_GET['it']." order by `liked` DESC";
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