<?php
ob_start();
session_start();
require_once("config.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time=time(); // Set Thời gian truy cập hiện tại của người dùng cho biến
$out=300; // Set Timeout tính bằng giây
$new=$time - $out; // Nếu người dùng không truy cập web trong [x] phút thì sẽ tính là người đó đã offline
if ($_SESSION['userid'] != NULL)
{
$userid=$_SESSION['userid'];
}
else
{
$userid=0;
}
if ($_SERVER['X_FORWARDED_FOR'] !="")
{
$X_FORWARDED_FOR=explode(",", $_SERVER['X_FORWARDED_FOR']);
$count = count($X_FORWARDED_FOR);
if($count =0 ) {
$REMOTE_ADDR=trim($X_FORWARDED_FOR);
} else {
$REMOTE_ADDR=trim($X_FORWARDED_FOR[0]);
}
} else {
$REMOTE_ADDR=$_SERVER['REMOTE_ADDR'];
}
if ( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) )
{
$X_FORWARDED_FOR=explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
$REMOTE_ADDR=trim($X_FORWARDED_FOR[0]);
} else {
$REMOTE_ADDR=$_SERVER['REMOTE_ADDR']; }
// Hết đoạn code lấy IP
$self=$_SERVER['REQUEST_URI']; // Sử dụng $_SERVER['PHP_SELF'] để lấy đường dẫn mà người dùng đang truy cập
$sql="insert into online(time,ip,local,userid) values('$time','$REMOTE_ADDR','$self','$userid')";
$query=@mysql_query($sql);
// $REMOTE_ADDR là biến môi trường dùng để lấy ra IP của người truy cập.
// $PHP_SELF là biến môi trường dùng để lấy ra đường dẫn mà người dùng đang truy cập.
// Có thể dùng 2 biến $PHP_SELF và $HTTP_SERVER_VARS['PHP_SELF'] để thay thế cho $_SERVER['PHP_SELF'] (biến $self) nếu có lỗi
$sql="delete from `online` where `time` < $new";
$query=@mysql_query($sql);
// Xóa người dùng nếu họ đã offline
$sqlonline="SELECT DISTINCT `ip`,`userid` FROM `online`";
$queryonline=@mysql_query($sqlonline);
$online=@mysql_num_rows($queryonline);
?>