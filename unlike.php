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
echo "<style>
@charset 'utf-8';
/* Font */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../font/OpenSans.woff) format('woff');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(../font/OpenSans-Light.woff) format('woff');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  src: local('Open Sans Semibold'), local('OpenSans-Semibold'), url(../font/OpenSans-Semibold.woff) format('woff');
}
p {
font-size: 1.05em;
color: #2b2b2b;
line-height: 1.4em;
font: 90.5% 'Open Sans';
}

.cmtLike {
font-size: 13px !important;
border: solid 1px #0f0f0f;
border-radius: 2px;
color: #0f0f0f !important;
font-weight: normal;
background-image: url(../images/icon_like.jpg);
background-position: 5px 4px;
background-repeat: no-repeat;
background-color: #fff;
padding-left: 23px;
padding-right: 4px;
padding-bottom: 1px;
text-decoration: none !important;
text-shadow: none !important;
}

.cmtLiked {
background-image: url(../images/icon_like_active.png);
}
</style>
<script type='text/javascript' src='./js/jquery-2.1.0.js'></script>
<script type='text/javascript' src='./js/jquery-2.1.0.min.js'></script>";
if (isset($_GET[id]))
{
if ($_SESSION["userid"] != NULL)
{
$sql="SELECT * FROM `comments` where `id`=".$_GET[id].""; 
$query=@mysql_query($sql); 
if(@mysql_num_rows($query) != NULL)
{
$row=@mysql_fetch_array($query);
$kt=0;
$y=explode(',',$row[uid_liked]);
foreach ($y as $id2)
{
if ($id2 == $_SESSION["userid"])
	{
	$kt=1;
	}
}
if ($kt == 1)
{
echo "
<form action='' method='POST'>
<p style='text-align:center;'>
Bạn có chắc muốn bỏ thích bình luận này?<br/>
<input type='hidden' name='idlike' value='".$_GET[id]."'>
<input type='submit' name='downlike' class='cmtLike cmtLiked' style='float: right' value='Bỏ thích' /></p></form>";
if (isset($_POST[downlike]))
{
like_down();
?>
<script>
$(".cmtLiked").removeClass('cmtLiked');
$('.cmtLike').attr('value','Đã bỏ thích');
$('.cmtLike').attr('type','button');
</script>
<?php
}
}
else
{
echo "<p style='text-align: center;'>Bạn chưa thích bình luận này!</p>";
}
}
else 
{
echo "<p style='text-align: center;'>Bình luận này không có thật!</p>";
}
}
else 
{
echo "<p style='text-align: center;'>Bạn phải đăng nhập để thích bình luận này!</p>";
}
}
else 
{
echo "<p style='text-align: center;'>Có lỗi</p>";
}
?>