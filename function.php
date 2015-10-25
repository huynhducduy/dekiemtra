<?php
// Lấy phần mở rộng của tên file
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
// Cắt chuỗi (Hàm giá trị)
function cu_t($s,$len){
if (mb_strlen($s,'UTF-8') > $len)
	{
	return mb_substr($s,0,$len,'UTF-8')."..."; 
	}
	else
	{
	return mb_substr($s,0,$len,'UTF-8');
	}
}
// Làm Chuẩn (hàm giá trị)
function str_filter($str){
 $unicode = array(
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|ä|å|æ' , 
'd'=>'đ|ð', 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 
'i'=>'í|ì|ỉ|ĩ|ị|î|ï', 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ', 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ', 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Ä|Å|Æ' , 
'D'=>'Đ', 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë', 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï', 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ', 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự', 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ', 
'-'=>' - | ',
''=>'~|!|@|#|$|%|^|&|_|=|{|}|\|:|;|"|<|,|>|[.,]|[(,]|[),]'
);
foreach ($unicode as $nonUnicode=>$uni){
     $str = preg_replace("/($uni)/i", $nonUnicode, $str);
}
return $str;
}
// Gửi Mail (Hàm thực thi)
function send_mail($to, $subject, $message, $header) 
{
$header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header);
}
// Lấy thời gian hiện tại (Hàm giá trị)
function get_time() {
$now = getdate();
$currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
$currentDate = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];
return $currentDate." ".$currentTime;
}
// Xác định thời gian (Hàm giá trị)
function ti_me($time_ago)
{
$cur_time=time();
$time_elapsed = $cur_time - $time_ago;
$seconds = $time_elapsed ;
$minutes = round($time_elapsed / 60 );
$hours = round($time_elapsed / 3600);
$days = round($time_elapsed / 86400 );
$weeks = round($time_elapsed / 604800);
$months = round($time_elapsed / 2600640 );
$years = round($time_elapsed / 31207680 );
if($seconds <= 60)
{
return $time_ago="Cách đây $seconds giây";
}
else if($minutes <=60)
{
if($minutes==1)
{
return $time_ago="Cách đây 1 phút";
}
else
{
return $time_ago="Cách đây $minutes phút";
}
}
else if($hours <=24)
{
if($hours==1)
{
return $time_ago="Cách đây 1 tiếng";
}
else
{
return $time_ago="Cách đây $hours tiếng";
}
}
else if($days <= 7)
{
if($days==1)
{
return $time_ago="Ngày hôm qua";
}
else
{
return $time_ago="Cách đây $days ngày";
}
}
else if($weeks <= 4.3)
{
if($weeks==1)
{
return $time_ago="Cách đây 1 tuần";
}
else
{
return $time_ago="Cách đây $weeks tuần";
}
}
else if($months <=12)
{
if($months==1)
{
return $time_ago="Cách đây 1 tháng";
}
else
{
return $time_ago="Cách đây $months tháng";
}
}
else
{
if($years==1)
{
return $time_ago="Cách đây 1 năm";
}
else
{
return $time_ago="Cách đây $years năm";
}
}
}
//Lấy giá trị từ settings (Hàm giá trị)
function settings($value) {
$sql="SELECT * FROM `settings`"; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
return $value=$row[$value];
}
//Tăng lượt view (Hàm thực thi)
function view_up() {
$sql="SELECT * FROM `settings`"; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
$view=$row['view']+1;
$sqlview="update `settings` set `view`='".$view."'";
$queryview=@mysql_query($sqlview);
}
//Tăng lượt like cmt (Hàm thực thi)
function like_up() {
$sql="SELECT * FROM `comments` where `id`=".$_POST[idlike].""; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
$liked=$row['liked']+1;
if ($row['uid_liked'] != NULL)
{
$uid_liked=$row['uid_liked'].",".$_SESSION["userid"];
}
else
{
$uid_liked=$_SESSION["userid"];
}
$sqlliked="update `comments` set `liked`='".$liked."',`uid_liked`='".$uid_liked."' where `id`='".$_POST[idlike]."'";
$queryliked=@mysql_query($sqlliked);
}
//Tăng lượt like test (Hàm thực thi)
function like_up1() {
$sql="SELECT * FROM `tests` where `id`=".$_GET[it].""; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
$liked=$row['liked']+1;
if ($row['uid_liked'] != NULL)
{
$uid_liked=$row['uid_liked'].",".$_SESSION["userid"];
}
else
{
$uid_liked=$_SESSION["userid"];
}
$sqlliked="update `tests` set `liked`='".$liked."',`uid_liked`='".$uid_liked."' where `id`='".$_GET[it]."'";
$queryliked=@mysql_query($sqlliked);
}
//Giảm lượt like cmt (Hàm thực thi)
function like_down() {
$sql="SELECT * FROM `comments` where `id`=".$_POST[idlike].""; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
$liked=$row['liked']-1;
$y=explode(',',$row[uid_liked]);
foreach ($y as $id2)
{
if ($id2 != $_SESSION["userid"])
	{
	if ($uid_liked == NULL)
		{
		$uid_liked=$id2;
		}
		else
		{
		$uid_liked=$uid_liked.",".$id2;
		}
	}
}
$sqlliked="update `comments` set `liked`='".$liked."',`uid_liked`='".$uid_liked."' where `id`='".$_POST[idlike]."'";
$queryliked=@mysql_query($sqlliked);
}
//Giảm lượt like cmt (Hàm thực thi)
function like_down1() {
$sql="SELECT * FROM `tests` where `id`=".$_GET[it].""; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
$liked=$row['liked']-1;
$y=explode(',',$row[uid_liked]);
foreach ($y as $id2)
{
if ($id2 != $_SESSION["userid"])
	{
	if ($uid_liked == NULL)
		{
		$uid_liked=$id2;
		}
		else
		{
		$uid_liked=$uid_liked.",".$id2;
		}
	}
}
$sqlliked="update `tests` set `liked`='".$liked."',`uid_liked`='".$uid_liked."' where `id`='".$_GET[it]."'";
$queryliked=@mysql_query($sqlliked);
}
//Tăng lượt download (Hàm thực thi)
function download_up() {
$sql="SELECT * FROM `settings`"; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
$download=$row['download']+1;
$sqldownload="update `settings` set `download`='".$download."'";
$querydownload=@mysql_query($sqldownload);
}
//Tăng lượt download2 (Hàm thực thi)
function download2_up() {
if ($_GET['t'] == "test")
{
$sql="SELECT * FROM `test_parts` where `id`='".$_GET['i']."'";
$query=@mysql_query($sql);
$row=@mysql_fetch_array($query);
$download=$row['download']+1;
$sqldownload="update `test_parts` set `download`='".$download."' where `id`='".$_GET['i']."'";
$querydownload=@mysql_query($sqldownload);
}
if ($_GET['t'] == "ans")
{
$sql="SELECT * FROM `answer_parts` where `id`='".$_GET['i']."'";
$query=@mysql_query($sql);
$row=@mysql_fetch_array($query);
$download=$row['download']+1;
$sqldownload="update `answer_parts` set `download`='".$download."' where `id`='".$_GET['i']."'";
$querydownload=@mysql_query($sqldownload);
}
}
//Lấy số thành viên (Hàm giá trị)
function user_count() {
$sql="SELECT * FROM `users`"; 
$query=@mysql_query($sql);
return mysql_num_rows($query);
}
//Lấy lượt download (Hàm giá trị)
function download_count() {
$sql="SELECT * FROM `settings`"; 
$query=@mysql_query($sql); 
$row=@mysql_fetch_array($query);
return $row['download'];
}
//Lấy số đề thi (Hàm giá trị)
function test_count() {
$sql="SELECT * FROM `tests`"; 
$query=@mysql_query($sql);
return mysql_num_rows($query);
}
// Add đề thi đã download (Hàm thực thi)
function down_user($i)
{
$sql="SELECT * FROM `users` where `id`='".logging_account(id)."'";
$query=@mysql_query($sql);
$row=@mysql_fetch_array($query);
	if ($row[down] == NULL)
	{
	$sqldownload="update `users` set `down`='".$i."' where `id`='".logging_account(id)."'";
	}
	else
	{
	$sqldownload="update `users` set `down`='".$row[down].",".$i."' where `id`='".logging_account(id)."'";
	}
$querydownload=@mysql_query($sqldownload);
}
// Lấy thông tin acc đang đăng nhập
function logging_account($value)
{
if ($_SESSION["userid"] != NULL)
{
	$sql="SELECT * FROM `users` where `id`='".$_SESSION["userid"]."'";
	$query=@mysql_query($sql);
	$row=@mysql_fetch_array($query);
}
return $value=$row[$value];
}
// Lấy thông tin acc bất kì
function account($id,$value)
{
	$sql="SELECT * FROM `users` where `id`='".$id."'";
	$query=@mysql_query($sql);
	$row=@mysql_fetch_array($query);
return $row[$value];
}
// Đăng nhập (Hàm thực thi)
function login() {
if($_POST["username"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập tên tài khoản!</p>";
}
else
{
	$u=mysql_escape_string($_POST["username"]);
}
if($_POST["password"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập mật khẩu!</p>";
}
else
{
	$p=mysql_escape_string(md5($_POST["password"]));
}
if($u && $p)
{
	$sql="select * from `users` where `username`='".$u."' and `password`='".$p."'";
	$query=@mysql_query($sql);
	if(@mysql_num_rows($query) == 0)
	{
		echo "<p class='message_red'>Tài khoản hoặc mật khẩu không đúng!</p>";
	}
	else
	{
		$row=mysql_fetch_array($query);
		$_SESSION["userid"] = $row[id];
		echo "<p class='message_green'>Đăng nhập thành công!</p>";
		if (isset($_POST["remember"])) 
		{ 
			setcookie("cookid", $_SESSION['userid'], time()+60*60*24*7);
		}
		if (isset($_GET["goto"]))
		{
		header("refresh: 2; url=".$_GET["goto"]."" );
		}
		else
		{
		header("refresh: 2; url=/" );
		}
	}
}
}
// Đăng xuất (Hàm thực thi)
function logout() {
session_destroy();
setcookie("cookid","",time()-1);
echo "<p class='message_green'>Đăng xuất thành công!</p>";
header("refresh: 2; url=/" );
}
// Đăng ký (Hàm thực thi)
function register() {
if($_POST["capt"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập mã bảo vệ!</p>";
}
else
{
	if($_POST["capt"] == $_SESSION["security_code"])
	{
		if($_POST["username"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập tên tài khoản!</p>";
		}
		else
		{
			$u=mysql_escape_string($_POST["username"]);
		}
		if($_POST["email"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập email!</p>";
		}
		else
		{
			$m=mysql_escape_string($_POST["email"]);
		}
		if($_POST["password"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập mật khẩu!</p>";
		}
		else
		{
			if($_POST["repassword"] == NULL)
			{
				echo "<p class='message_red'>Bạn chưa nhập lại mật Khẩu!</p>";
			}
			else
			{
				if ($_POST["repassword"] == $_POST['password'])
				{
					$p=mysql_escape_string(md5($_POST["password"]));
				}
				else
				{
					echo "<p class='message_red'>Mật khẩu và nhập lại mật khẩu chưa giống nhau!</p>";
				}
			}
		}
		if($_POST["pass2"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập mật khẩu cấp 2!</p>";
		}
		else
		{
			$p2=mysql_escape_string(md5($_POST["pass2"]));
		}
		if($u && $p && $p2 && $m)
		{
			$sql="select * from `users` where `username`='".$u."'";
			$query=@mysql_query($sql);
			if(@mysql_num_rows($query) != "")
			{
				echo "<p class='message_red'>Tên tài khoản này đã được dùng!</p>";
			}
			else
			{
				$sqlmail="select * from `users` where `email`='".$m."'";
				$querymail=@mysql_query($sqlmail);
				if(@mysql_num_rows($querymail) != "")
				{
					echo "<p class='message_red'>Địa chỉ email này đã được dùng!</p>";
				}
				else
				{
				$sql2="insert into `users`(username,password,pass2,email) values('".$u."','".$p."','".$p2."','".$m."')";
				$query2=@mysql_query($sql2);
				///////// Gửi mail
				$to=$m;
				$subject="Chào mừng bạn đã đến với ".settings('title')." - ".settings('description')."";
				$message="
Chào ".$u."<br/>
<br/>  
Cảm ơn bạn đã đăng ký tài khoản tại ".settings('title')."!<br/>
Thông tin tài khoản của bạn như sau:<br/>
- Tên tài khoản: ".$u."<br/>
- Mật khẩu: ".$_POST["password"]."<br/>
- Mật khẩu cấp 2: ".$_POST["pass2"]."<br/>
- Địa chỉ email: ".$m."<br/>
Từ giờ bạn có thể đăng nhập vào ".settings('title')." bằng thông tin đăng nhập như trên để tham gia các hoạt động của website!<br/>
<br/>  
Thân,<br/>
".settings('title');
				$header = "From: admin@".settings('domain')."" . "\r\n";
				$header .= "Reply-To: admin@".settings('domain')."" . "\r\n";
				send_mail($to, $subject, $message, $header);
				echo "<p class='message_green'>Đăng ký thành công!<br/>Đang đăng nhập...</p>";
				$sql3="select * from `users` where `username`='".$u."' and `password`='".$p."'";
				$query3=@mysql_query($sql3);
				$row3=@mysql_fetch_array($query3);
				$_SESSION["userid"] = $row3[id];
				setcookie("cookid", $_SESSION["userid"], time()+60*60*24*7);
				
						if (isset($_GET["goto"]))
						{
						header("refresh: 2; url=".$_GET["goto"]."" );
						}
						else
						{
						header("refresh: 2; url=/" );
						}
				}
			}
		}
	}
	else
	{
		echo "<p class='message_red'>Mã bảo vệ sai!</p>";
	}
}
}
// Lấy lại mật khẩu
function forgot() {
if($_POST["capt"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập mã bảo vệ!</p>";
}
else
{
	if($_POST["capt"] == $_SESSION["security_code"])
	{
		if($_POST["email"] == NULL)
			{
				echo "<p class='message_red'>Bạn chưa nhập địa chỉ email!</p>";
			}
			else
			{
				$m=mysql_escape_string($_POST["email"]);
			}
			if($m)
			{
				$sql="select * from `users` where `email`='".$m."'";
				$query=@mysql_query($sql);
				if(@mysql_num_rows($query) == 0)
				{
					echo "<p class='message_red'>Địa chỉ email không chính xác!</p>";
				}
				else
				{
					$row=@mysql_fetch_array($query);
					$md5_hash = md5(rand(0,999999));
					$pass = md5(substr($md5_hash, 15, 17));
					$to=$m;
					$subject="Mật khẩu của bạn đã được trả lại ở ".settings('title')." - ".settings('description')."";
					$message="
Chào ".$row[username]."<br/>
<br/>
Bạn đã gửi cho chúng tôi một yêu cầu lấy lại mật khẩu ở ".settings('title')." - ".settings('url')."<br/>
Mật khẩu mới của bạn: ".substr($md5_hash, 15, 17)."<br/>
Bạn có thể truy cập vào ".settings('title')." - ".settings('url')." để đăng nhập với mật khẩu như trên ngay bây giờ!<br/>
Sau khi đăng nhập thành công, bạn nên đổi mật khẩu ngay lập tức để tránh những trường hợp đáng tiếc xảy ra.<br/>
<br/> 
Thân,<br/>
".settings('title');
					$header = "From: admin@".settings(domain)."" . "\r\n";
					$header .= "Reply-To: admin@".settings(domain)."" . "\r\n";
					send_mail($to, $subject, $message, $header);
					$sql2="update `users` set `password`='".$pass."' where `email`='".$m."'";
					$query2=@mysql_query($sql2);
					//////Gửi mail
					echo "<p class='message_green'>Lấy lại mật khẩu thành công!<br/>Chúng tôi đã gửi mật khẩu mới về email của bạn, hãy kiểm tra ngay bây giờ!</p>";
				}
			}
	}
	else
	{
		echo "<p class='message_red'>Mã bảo vệ sai!</p>";
	}
}
}
// Đổi thông tin (Hàm thực thi)
function edit_profile() {
if($_POST["capt"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập mã bảo vệ!</p>";
}
else
{
	if($_POST["capt"] == $_SESSION["security_code"])
	{
	if($_POST["password"] == NULL)
		{
			echo "<p class='message_red'>Ban chưa nhập nhập mật khẩu!</p>";
		}
		else
		{
			$sql="select * from `users` where `id`='".$_SESSION['userid']."' and `password`='".md5($_POST["password"])."'";
			$query=@mysql_query($sql);
			if(@mysql_num_rows($query) == 0)
			{
				echo "<p class='message_red'>Mật khẩu không đúng!</p>";
			}
			else
			{
				$n=mysql_escape_string($_POST['name']);
				$bd=mysql_escape_string($_POST['birthday']);
				$s=mysql_escape_string($_POST['sex']);
				$ad=mysql_escape_string($_POST['address']);
				$yh=mysql_escape_string($_POST['yahoo']);
				$m=mysql_escape_string($_POST['email']);
				$p=mysql_escape_string($_POST['phone']);
				if ($_FILES['file']['name'] != NULL)
				{
					if (((strtolower(getExtension($_FILES['file']['name'])) == "jpg")
					|| (strtolower(getExtension($_FILES['file']['name'])) == "png")
					|| (strtolower(getExtension($_FILES['file']['name'])) == "gif")))
					{
						$name=md5(rand(0,9999999)).md5(rand(0,9999999)).".jpg";
						move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $name);
						$a=mysql_escape_string("../upload/".$name);
					}
					else
					{
						$a=logging_account(avatar);
						echo "<p class='message_red'>Không cho phép upload loại file này!</p>";
					}
				}
				else { $a=logging_account(avatar); }
				$sql2="update `users` set name='".$n."', birthday='".$bd."',sex='".$s."',address='".$ad."',yahoo='".$yh."',email='".$m."',phone='".$p."',avatar='".$a."' where id='".$_SESSION['userid']."'";
				$query=@mysql_query($sql2);
				/////Gửi mail
				if ($s == 1) { $ssex="Nam"; } else { $ssex="Nữ"; }
				$to=$m;
$subject="Thông tin thành viên của bạn đã được thay đổi ở ".settings('title')." - ".settings('description')."";
$message="
Chào ".$u."

Bạn đã thay đổi một vài thông tin cá nhân của mình ở ".settings('title')." - ".settings('url')."<br/>
Thông tin hiện tại của bạn là:<br/>
<br/>
- Tên: ".$n."<br/>
- Ngày sinh: ".$bd."<br/>
- Giới tính: ".$ssex."<br/>
- Địa chỉ: ".$ad."<br/>
- Yahoo: ".$yh."<br/>
- Email: ".$m."<br/>
- Điện thoại: ".$p."<br/>
<br/>
Thân,<br/>
".settings('title');
$header = "From: admin@".settings('domain')."" . "\r\n";
$header .= "Reply-To: admin@".settings('domain')."" . "\r\n";
send_mail($to, $subject, $message, $header);
				echo "<p class='message_green'>Thay đổi thông tin thành công!</p>";
			}
		}
	}
	else
	{
		echo "<p class='message_red'>Mã bảo vệ sai!</p>";
	}
}
}
// Đóng góp đề kiểm tra (Hàm thực thi)
function upload() {
if($_POST["capt"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập mã bảo vệ!</p>";
}
else
{
	if($_POST["capt"] == $_SESSION["security_code"])
	{
	if($_POST["title"] == NULL)
		{
			echo "<p class='message_red'>Ban chưa nhập tên đề kiểm tra!</p>";
		}
		else
		{
			$title=mysql_escape_string($_POST["title"]);
		}
	if($_POST["cg1"] == 0)
		{
			echo "<p class='message_red'>Ban chưa chọn danh mục cho đề kiểm tra!</p>";
		}
		else
		{
			$cg1=mysql_escape_string($_POST["cg1"]);
		}
	if($_POST["content"] == NULL)
		{
			echo "<p class='message_red'>Ban chưa bình luận cho đề kiểm tra!</p>";
		}
		else
		{
			$content=mysql_escape_string($_POST["content"]);
		}
	if($_FILES['file']['name'] == NULL)
		{
			echo "<p class='message_red'>Ban chưa chọn file đề kiểm tra!</p>";
		}
	if ($_FILES['file']['name'] == NULL)
		{
			echo "<p class='message_red'>Ban chưa chọn đề kiểm tra để upload!</p>";
		}
		$origin=mysql_escape_string($_POST["origin"]);
		If ($title && $cg1 && $content && $_FILES['file']['name'])
		{
			if (((strtolower(getExtension($_FILES['file']['name']))  == "pdf")
			|| (strtolower(getExtension($_FILES['file']['name']))  == "doc")
			|| (strtolower(getExtension($_FILES['file']['name']))  == "docx")
			|| (strtolower(getExtension($_FILES['file']['name']))  == "rar")
			|| (strtolower(getExtension($_FILES['file']['name']))  == "7z")
			|| (strtolower(getExtension($_FILES['file']['name']))  == "zip")))
				{
					$name=md5(rand(0,9999999)).md5(rand(0,9999999)).".".getExtension($_FILES['file']['name']);
					move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $name);
					$a=mysql_escape_string("../upload/".$name);
					$sql2="insert into `contributions`(title,content,source,origin,uploader,cg1,time) values('".$title."','".$content."','".$a."','".$origin."','".$_SESSION['userid']."','".$cg1."','".time()."')";
					$query=@mysql_query($sql2);
					echo "<p class='message_green'>Đóng góp đề kiểm tra thành công, ban quản trị sẽ kiểm duyệt đề kiểm tra của bạn trong thời gian sớm nhất, xin cảm ơn!</p>";
				}
				else
				{
					echo "<p class='message_red'>Không cho phép upload loại file này!</p>";
				}
		}
	}
	else
	{
		echo "<p class='message_red'>Mã bảo vệ sai!</p>";
	}
}
}
// Đổi mật khẩu (Hàm thực thi)
function change_pass() {
if($_POST["capt"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập mã bảo vệ!</p>";
}
else
{
	if($_POST["capt"] == $_SESSION["security_code"])
	{
		if($_POST["username"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập nhập tên tài khoản!</p>";
		}
		else
		{
			$u=mysql_escape_string($_POST["username"]);
		}
		if($_POST["expassword"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập mật khẩu cũ!</p>";
		}
		else
		{
			$p2=md5($_POST["expassword"]);
		}
		if($_POST["password"] == NULL)
		{
			echo "<p class='message_red'>Ban chưa nhập nhập mật khẩu mới!</p>";
		}
		else
		{
			if($_POST["repassword"] == NULL)
			{
				echo "<p class='message_red'>Ban chưa nhập nhập lại mật khẩu mới!</p>";
			}
			else
			{
				if($_POST["repassword"] == $_POST["password"])
				{
					$p=mysql_escape_string(md5($_POST["password"]));
				}
				else
				{
					echo "<p class='message_red'>Mật khẩu và nhập lại mật khẩu chưa giống nhau!</p>";
				}
			}
		}
		if($u && $p && $p2)
		{
			$sql="select * from `users` where `username`='".$u."' and `password`='".$p2."'";
			$query=@mysql_query($sql);
			if(@mysql_num_rows($query) == 0)
			{
				echo "<p class='message_red'>Tên tài khoản hoặc mật khẩu cũ không đúng!</p>";
			}
			else
			{
				$row=@mysql_fetch_array($query);
				$sql2="update `users` set `password`='".$p."' where `username`='".$u."' and `password`='".$p2."'";
				$query2=@mysql_query($sql2);
				/////Gửi mail
$to=$row[email];
$subject="Mật khẩu của bạn đã được thay đổi ở ".settings('title')." - ".settings('description')."";
$message="
Chào ".$u."<br/>
<br/>
Bạn đã thay đổi mật khẩu đăng nhập của mình ở ".settings('title')." - ".settings('url')."<br/>
Mật khẩu bạn vừa thay đổi là: ".$_POST["password"]."<br/>
<br/>
Thân,<br/>
".settings('title');
				$header = "From: admin@".settings('domain')."" . "\r\n";
				$header .= "Reply-To: admin@".settings('domain')."" . "\r\n";
				send_mail($to, $subject, $message, $header);
				echo "<p class='message_green'>Đổi mật khẩu thành công!</p>";
			}
		}
	}
	else
	{
		echo "<p class='message_red'>Mã bảo vệ sai!</p>";
	}
}
}
// Đổi mật khẩu bằng mật khẩu cấp 2(Hàm thực thi)
function change_pass2() {
if($_POST["capt"] == NULL)
{
	echo "<p class='message_red'>Bạn chưa nhập mã bảo vệ!</p>";
}
else
{
	if($_POST["capt"] == $_SESSION["security_code"])
	{
		if($_POST["username"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập nhập tên tài khoản!</p>";
		}
		else
		{
			$u=mysql_escape_string($_POST["username"]);
		}
		if($_POST["password2"] == NULL)
		{
			echo "<p class='message_red'>Bạn chưa nhập mật khẩu cấp 2!</p>";
		}
		else
		{
			$p2=mysql_escape_string(md5($_POST["password2"]));
		}
		if($_POST["password"] == NULL)
		{
			echo "<p class='message_red'>Ban chưa nhập nhập mật khẩu mới!</p>";
		}
		else
		{
			if($_POST["repassword"] == NULL)
			{
				echo "<p class='message_red'>Ban chưa nhập nhập lại mật khẩu mới!</p>";
			}
			else
			{
				if($_POST["repassword"] == $_POST["password"])
				{
					$p=mysql_escape_string(md5($_POST["password"]));
				}
				else
				{
					echo "<p class='message_red'>Mật khẩu và nhập lại mật khẩu chưa giống nhau!</p>";
				}
			}
		}
		if($u && $p && $p2)
		{
			$sql="select * from `users` where `username`='".$u."' and `pass2`='".$p2."'";
			$query=@mysql_query($sql);
			if(@mysql_num_rows($query) == 0)
			{
				echo "<p class='message_red'>Tài khoản hoặc mật khẩu cấp 2 không đúng!</p>";
			}
			else
			{
				$row=@mysql_fetch_array($query);
				$sql2="update `users` set `password`='".$p."' where `username`='".$u."' and `pass2`='".$p2."'";
				$query2=@mysql_query($sql2);
				/////Gửi mail
				$to=$row[email];
				$subject="Mật khẩu của bạn đã được thay đổi ở ".settings('title')." - ".settings('description')."";
$message="
Chào ".$u."<br/>
<br/>
Bạn đã thay đổi mật khẩu đăng nhập của mình ở ".settings('title')." - ".settings('url')."<br/>
Mật khẩu bạn vừa thay đổi là: ".$_POST["password"]."<br/>
<br/>
Thân,<br/>
".settings('title');
				$header = "From: admin@".settings('domain')."" . "\r\n";
				$header .= "Reply-To: admin@".settings('domain')."" . "\r\n";
				send_mail($to, $subject, $message, $header);
				echo "<p class='message_green'>Đổi mật khẩu thành công!</p>";
			}
		}
	}
	else
	{
		echo "<p class='message_red'>Mã bảo vệ sai!</p>";
	}
}
}
// Liên hệ (Hàm thực thi)
function contact() {
/////Gửi mail
$to=settings(admin_mail);
$subject="Thư liên hệ từ người dùng ở ".settings('title')." - ".settings('description')."";
$message="
Một người dùng tên ".$_POST[name]." với địa chỉ email là ".$_POST[email]." từ ".settings('title')." đã gửi cho bạn một liên hệ:<br/>
<br/>
".$_POST[mess]."<br/>
<br/>
Thân,<br/>
".settings('title');
$header = "From: admin@".settings('domain')."" . "\r\n";
$header .= "Reply-To: admin@".settings('domain')."" . "\r\n";
send_mail($to, $subject, $message, $header);
echo "<p class='message_green'>Liên hệ thành công! Chúng tôi sẽ hồi âm vào địa chỉ email của bạn sớm nhất có thể, cảm ơn!</p>";
}
// Subcribe (Hàm thực thi)
function sub() {
$email=mysql_escape_string($_POST['emailxxx']);
$sql="select * from `subs` where `email`='".$email."'";
$query=@mysql_query($sql);
if(@mysql_num_rows($query) == 0)
{
	$sql2="insert into `subs`(email) values('".$email."')";
	$query2=@mysql_query($sql2);
	echo "
	<script>
	$(function(){
			$('#overlay').show()
			$('#form2').fadeIn()
			$('#form_content2').html('Bạn đã đăng ký theo dõi thành công!');
	})
	</script>";
}
else
{
	echo "
	<script>
	$(function(){
			$('#overlay').show()
			$('#form2').fadeIn()
			$('#form_content2').html('Địa chỉ email này đã được đăng ký rồi, bạn hãy thử lại với một địa chỉ khác!');
	})
	</script>";
}
}
// Report đề kiểm tra (Hàm thực thi)
function report() {
$testid=mysql_escape_string($_POST['testid']);
$error=mysql_escape_string($_POST['error']);
$note=mysql_escape_string($_POST['note']);
$sql="insert into `reports`(testid,error,note) values('".$testid."','".$error."','".$note."')";
$query=@mysql_query($sql);
echo "
<script>
$(function(){
        $('#overlay').show()
        $('#form1').fadeIn()
		$('#form_content1').html('Lỗi của bạn đã được tiếp nhận, chúng tôi sẽ kiểm tra và sửa chửa nhanh nhất có thể, cảm ơn bạn!');
})
</script>";
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Basic
function basic() {
if($_FILES['file']['name'] != NULL)
{
	if (((strtolower(getExtension($_FILES['file']['name']))  == "jpg")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "png")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "gif")))
	{
		$name=md5(rand(0,9999999)).md5(rand(0,9999999)).".jpg";
		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $name);
		$a=mysql_escape_string("../admin/upload/".$name);
		$t=mysql_escape_string($_POST['title']);
		$d=mysql_escape_string($_POST['description']);
		$k=mysql_escape_string($_POST['keyword']);
		$au=mysql_escape_string($_POST['author']);
		$u=mysql_escape_string($_POST['url']);
		$do=mysql_escape_string($_POST['domain']);
		$i=mysql_escape_string($_POST['intro']);
		$sql="update `settings` set `title`='".$t."',`description`='".$d."',`keyword`='".$k."',`author`='".$au."',`url`='".$u."',`domain`='".$do."',`intro`='".$i."',`logo`='".$a."' where `lol`=1";
		$query=@mysql_query($sql);
		echo "<Br/>Chỉnh sửa thành công<br/>";
		header("refresh: 2; url=#" );
	}
	else
	{
	echo "<Br/>Không cho phép upload loại file này!<Br/>";
	}
}
else 
{ 
	$a=mysql_escape_string(settings(logo));
	$t=mysql_escape_string($_POST['title']);
	$d=mysql_escape_string($_POST['description']);
	$k=mysql_escape_string($_POST['keyword']);
	$au=mysql_escape_string($_POST['author']);
	$u=mysql_escape_string($_POST['url']);
	$do=mysql_escape_string($_POST['domain']);
	$i=mysql_escape_string($_POST['intro']);
	$sql="update `settings` set `title`='".$t."',`description`='".$d."',`keyword`='".$k."',`author`='".$au."',`url`='".$u."',`domain`='".$do."',`intro`='".$i."',`logo`='".$a."' where `lol`=1";
	$query=@mysql_query($sql);
	echo "<Br/>Chỉnh sửa thành công<br/>";
	header("refresh: 2; url=#" );
}
}
// Admin Info
function admininfo() {
$e=mysql_escape_string($_POST['email']);
$p=mysql_escape_string($_POST['phone']);
$f=mysql_escape_string($_POST['fb']);
$y=mysql_escape_string($_POST['yahoo']);
$sql="update `settings` set `admin_mail`='".$e."',`admin_fb`='".$f."',`admin_yahoo`='".$y."',`admin_phone`='".$p."' where `lol`=1";
$query=@mysql_query($sql);
echo "<br/>Chỉnh sửa thành công<br/>";
header("refresh: 2; url=#" );
}
// Social
function social() {
$a=mysql_escape_string($_POST['adfbid']);
$m=mysql_escape_string($_POST['modfbid']);
$ap=mysql_escape_string($_POST['appfbid']);
$pa=mysql_escape_string($_POST['pagefbid']);
$g=mysql_escape_string($_POST['gcseid']);
$sql="update `settings` set `fb_id_admin`='".$a."',`fb_id_mod`='".$m."',`fb_id_app`='".$ap."',`fb_id_page`='".$pa."',`gcseid`='".$g."' where `lol`=1";
$query=@mysql_query($sql);
echo "<br/>Chỉnh sửa thành công<br/>";
header("refresh: 2; url=#" );
}
// ADS
function ads() {
$a1=mysql_escape_string($_POST['qc1']);
$a2=mysql_escape_string($_POST['qc2']);
$a3=mysql_escape_string($_POST['qc3']);
$a4=mysql_escape_string($_POST['qc4']);
$a5=mysql_escape_string($_POST['qc5']);
$sql="update `settings` set `ads_1`='".$a1."',`ads_2`='".$a2."',`ads_3`='".$a3."',`ads_4`='".$a4."',`ads_5`='".$a5."' where `lol`=1";
$query=@mysql_query($sql);
echo "<Br/>Chỉnh sửa thành công<br/>";
header("refresh: 2; url=#" );
}
// Posttest
function posttest() {
if($_FILES['file']['name'] != NULL)
{
	if (((strtolower(getExtension($_FILES['file']['name']))  == "jpg")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "png")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "gif")))
	{
		$name=md5(rand(0,9999999)).md5(rand(0,9999999)).".jpg";
		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $name);
		$a=mysql_escape_string("../admin/upload/".$name);
		$a1=mysql_escape_string($_POST['title']);
		$a2=mysql_escape_string($_POST['cg1']);
		$a3=mysql_escape_string($_POST['descrip']);
		$a4=mysql_escape_string($_POST['key']);
		$a5=mysql_escape_string($_POST['test']);
		$a7=mysql_escape_string($_POST['ans']);
		if (isset($_POST['contri'])){ $a6=mysql_escape_string($_POST['contri']); } else {$a6=0;}
		$sql="insert into `tests`(time,id1,title,contribution,description,keyword,thumb) values('".time()."','".$a2."','".$a1."','".$a6."','".$a3."','".$a4."','".$a."')";
		$query=@mysql_query($sql);
		$sql2="SELECT * FROM `tests` order by `id` DESC";
		$query2=@mysql_query($sql2);
		$row2=@mysql_fetch_array($query2);
		$it=$row2[id];
if (isset($_POST['test'])) {
		$sql3="insert into `test_parts`(it,gdocid) values('".$it."','".$a5."')";
		$query3=@mysql_query($sql3); }
if (isset($_POST['ans'])) {
		$sql3="insert into `answer_parts`(it,gdocid) values('".$it."','".$a7."')";
		$query3=@mysql_query($sql3); }
		echo "<Br/>Đăng đề kiểm tra thành công<br/>";
		$sql="SELECT * FROM `subs`";
		$query=@mysql_query($sql);
		while ($row=@mysql_fetch_array($query))
		{
		//////Gửi mail thông báo đề kiểm tra mới
		$to=$row[email];
$subject="Đề kiểm tra mới từ ".settings('title').": ".$a1."";
$message="
Thư viện đề kiểm tra trực tuyến của chúng tôi vừa đăng tải một đề kiểm tra mới, mong là bạn sẽ không bỏ qua: <a target='_blank' href='".settings('url')."/".strtolower(str_filter($row2['title'])).".".$row2['id'].".php'>".$row2[title]."</a>
<br/>  
Thân,<br/>
".settings('title');
$header = "From: admin@".settings('domain')."" . "\r\n";
$header .= "Reply-To: admin@".settings('domain')."" . "\r\n";
send_mail($to, $subject, $message, $header);
		}
		if (isset($_POST['contri']))
		{
			$contri=mysql_escape_string($_POST['contri']);
			$sql="SELECT * FROM `users` where `id`='".$contri."'";
			$query=@mysql_query($sql);
			$row=@mysql_fetch_array($query);
				if ($row[up] == NULL)
				{
					$sqlupload="update `users` set `up`='".$it."' where `id`='".$contri."'";
				}
				else
				{
					$sqlupload="update `users` set `up`='".$row[up].",".$it."' where `id`='".$contri."'";
				}
			$queryupload=@mysql_query($sqlupload);
		}		
		header("refresh: 2; url=testlist.php");
	}
	else
	{
		echo "<Br/>Không cho phép upload loại file này!<Br/>";
	}
}
}
// Edittest
function edittest() {
if($_FILES['file']['name'] != NULL)
{
	if (((strtolower(getExtension($_FILES['file']['name']))  == "jpg")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "png")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "gif")))
	{
		$name=md5(rand(0,9999999)).md5(rand(0,9999999)).".jpg";
		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $name);
		$a=mysql_escape_string("../admin/upload/".$name);
		$a1=mysql_escape_string($_POST['title']);
		$a2=mysql_escape_string($_POST['cg1']);
		$a3=mysql_escape_string($_POST['descrip']);
		$a4=mysql_escape_string($_POST['key']);
		$a5=mysql_escape_string($_POST['test']);
		$a7=mysql_escape_string($_POST['ans']);
		$id=mysql_escape_string($_POST['id']);
		$a8=mysql_escape_string($_POST['liked']);
		$a9=mysql_escape_string($_POST['uid_liked']);
		$a10=mysql_escape_string($_POST['view']);
		$sql="update `tests` set `id1`='".$a2."',`title`='".$a1."',`description`='".$a3."',`keyword`='".$a4."',`thumb`='".$a."',`liked`='".$a8."',`uid_liked`='".$a9."',`view`='".$a10."' where `id`=".$id."";
		$query=@mysql_query($sql);
		$it=mysql_escape_string($_POST['id']);
$sqlvtc="select * from `test_parts` where `it`='".$it."'";
$queryvtc=@mysql_query($sqlvtc);
if (@mysql_num_rows($queryvtc) != 0)
{
		$sqlt="update `test_parts` set `gdocid`='".$a5."' where `it`='".$it."'";
                $queryt=@mysql_query($sqlt);
} else {
		$sql3="insert into `test_parts`(it,gdocid) values('".$it."','".$a5."')";
		$query3=@mysql_query($sql3);
}
$sqlvtc="select * from `answer_parts` where `it`='".$it."'";
$queryvtc=@mysql_query($sqlvtc);
if (@mysql_num_rows($queryvtc) != 0)
{
		$sqla="update `answer_parts` set `gdocid`='".$a7."' where `it`='".$it."'";
		$querya=@mysql_query($sqla);
} else {
		$sql3="insert into `answer_parts`(it,gdocid) values('".$it."','".$a7."')";
		$query3=@mysql_query($sql3);
}

		echo "<Br/>Chỉnh sửa thành công<br/>";
		header("refresh: 2; url=#");
	}
	else
	{
		echo "<br/>Không cho phép upload loại file này!<Br/>";
	}
} 
else 
{
	$id=mysql_escape_string($_POST['id']);
	$sqlx="SELECT * FROM `tests` WHERE `id`='".$id."'";
	$queryx=@mysql_query($sqlx);
	$rowx=@mysql_fetch_array($queryx);
	$a=mysql_escape_string($rowx[thumb]);
	$a1=mysql_escape_string($_POST['title']);
	$a2=mysql_escape_string($_POST['cg1']);
	$a3=mysql_escape_string($_POST['descrip']);
	$a4=mysql_escape_string($_POST['key']);
	$a5=mysql_escape_string($_POST['test']);
	$a7=mysql_escape_string($_POST['ans']);
	$a8=mysql_escape_string($_POST['liked']);
	$a9=mysql_escape_string($_POST['uid_liked']);
	$a10=mysql_escape_string($_POST['view']);
	$sql="update `tests` set `id1`='".$a2."',`title`='".$a1."',`description`='".$a3."',`keyword`='".$a4."',`thumb`='".$a."',`liked`='".$a8."',`uid_liked`='".$a9."',`view`='".$a10."' where `id`=".$id."";
	$query=@mysql_query($sql);
	$it=mysql_escape_string($_POST['id']);
	$sqlt="update `test_parts` set `gdocid`='".$a5."' where `it`='".$it."'";
	$sqla="update `answer_parts` set `gdocid`='".$a7."' where `it`='".$it."'";
	$queryt=@mysql_query($sqlt);
	$querya=@mysql_query($sqla); 
	echo "<Br/>Chỉnh sửa thành công<br/>";
	header("refresh: 2; url=#");
}
}
// Edituser
function edituser() {
if($_FILES['file']['name'] != NULL)
{
	if (((strtolower(getExtension($_FILES['file']['name']))  == "jpg")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "png")
	|| (strtolower(getExtension($_FILES['file']['name']))  == "gif")))
	{
		$name=md5(rand(0,9999999)).md5(rand(0,9999999)).".jpg";
		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $name);
		$a=mysql_escape_string("../admin/upload/".$name);
		$a2=mysql_escape_string($_POST['name']);
		$a3=mysql_escape_string($_POST['birthday']);
		$a4=mysql_escape_string($_POST['sex']);
		$a5=mysql_escape_string($_POST['address']);
		$a6=mysql_escape_string($_POST['yahoo']);
		$a7=mysql_escape_string($_POST['email']);
		$a8=mysql_escape_string($_POST['phone']);
		$id=mysql_escape_string($_POST['id']);
		if ($_POST['pass'] == NULL) {
		$sql="update `users` set `avatar`='".$a."',`name`='".$a2."',`birthday`='".$a3."',`sex`='".$a4."',`address`='".$a5."',`yahoo`='".$a6."',`email`='".$a7."',`phone`='".$a8."' where `id`=".$id."";
		$query=@mysql_query($sql);
		}
		else { 
		$a1=md5($_POST['pass']); 
		$id=mysql_escape_string($_POST['id']);
		$sql="update `users` set `avatar`='".$a."',`name`='".$a2."',`birthday`='".$a3."',`sex`='".$a4."',`address`='".$a5."',`yahoo`='".$a6."',`email`='".$a7."',`phone`='".$a8."',`password`='".$a1."' where `id`=".$id."";
		$query=@mysql_query($sql);
		}
		echo "<Br/>Chỉnh sửa thành công<br/>";
		header("refresh: 2; url=#");
	}
	else
	{
		echo "<br/>Không cho phép upload loại file này!<Br/>";
	}
} 
else 
{
	$id=mysql_escape_string($_POST['id']);
	$sqlx="SELECT * FROM `users` WHERE `id`='".$id."'";
	$queryx=@mysql_query($sqlx);
	$rowx=@mysql_fetch_array($queryx);
	$a=mysql_escape_string($rowx[avatar]);
	$a1=mysql_escape_string(md5($_POST['pass']));
	$a2=mysql_escape_string($_POST['name']);
	$a3=mysql_escape_string($_POST['birthday']);
	$a4=mysql_escape_string($_POST['sex']);
	$a5=mysql_escape_string($_POST['address']);
	$a6=mysql_escape_string($_POST['yahoo']);
	$a7=mysql_escape_string($_POST['email']);
	$a8=mysql_escape_string($_POST['phone']);
	$sql="update `users` set `avatar`='".$a."',`name`='".$a2."',`birthday`='".$a3."',`sex`='".$a4."',`address`='".$a5."',`yahoo`='".$a6."',`email`='".$a7."',`phone`='".$a8."',`password`='".$a1."' where `id`=".$id."";
	$query=@mysql_query($sql);echo "<Br/>Chỉnh sửa thành công<br/>";
	header("refresh: 2; url=#");
}
}
// Editsub
function editsub() {
$e=mysql_escape_string($_POST['email']);
$id=mysql_escape_string($_POST[id]);
$sql="update `subs` set `email`='".$e."' where `id`='".$id."'";
$query=@mysql_query($sql);
echo "<Br/>Chỉnh sửa thành công<br/>";
header("refresh: 2; url=#" );
}
// Delsub
function delsub() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `subs` where `id`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=sublist.php" );
}
// Deltest
function deltest() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `tests` where `id`='".$id."'";
$query=@mysql_query($sql);
$sql="delete from `test_parts` where `it`='".$id."'";
$query=@mysql_query($sql);
$sql="delete from `answer_parts` where `it`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=testlist.php" );
}
// Deluser
function deluser() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `users` where `id`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=userlist.php" );
}
// Delreport
function delreport() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `reports` where `id`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=testreport.php" );
}
// Delcontri
function delcontri() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `contributions` where `id`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=testcontri.php" );
}
// Finish
function finish() {
$sql="insert into `test_history`(it,uid,comp,time) values('".$_GET['it']."','".$_SESSION["userid"]."','".$comp."','".$_POST["timee"]."')";
$query=@mysql_query($sql);
$tid=@mysql_insert_id();
$comp=time()-$_POST["timee"];
$comp2=round($comp/60);
$sqlques="SELECT * FROM `ques_parts` where `it`='".$_GET['it']."'";
$queryques=@mysql_query($sqlques);
$i=0;
$score=0;
while ($rowques=@mysql_fetch_array($queryques))
{
$i++;
if ($rowques[answer] != NULL)
{
	$score2=$score2+$rowques[score];
	if ($_POST["ans".$i] == $rowques[tf])
		{
			$score=$score+$rowques[score];
			$tf=1;
		} else { $tf=0; }
	$sqlqueshis="insert into `ques_history`(qid,tid,content,tf) values('".$rowques[id]."','".$tid."','".mysql_escape_string($_POST["ans".$i])."','".$tf."')";
	$queryqueshis=@mysql_query($sqlqueshis);
}
else
{
	$sqlqueshis="insert into `ques_history`(qid,tid,content,tf) values('".$rowques[id]."','".$tid."','".mysql_escape_string($_POST["ans".$i])."',3)";
	$queryqueshis=@mysql_query($sqlqueshis);
}
}
$sql="update `test_history` set `score`='".$score."',`comp`='".$comp2."' where `id`=".$tid."";
$query=@mysql_query($sql);
$sql="SELECT * FROM `tests` where `id`='".$_GET['it']."'";
$query=@mysql_query($sql);
$row=@mysql_fetch_array($query);
echo "<h4 style='font-style: normal;'>Điểm: ".$score."/".$score2."</h4>";
echo "<h4 style='font-style: normal;'>Thời gian làm bài: ".$comp2." phút/".$row[time2]." phút</h4>";
echo "<center><p><a href='./bao-cao-lam-thu/".strtolower(str_filter(account($_SESSION["userid"],username)))."/".strtolower(str_filter($row[title]))."-".$tid."'><button class='button2'>Xem chi tiết kết quả</button></a><br/></p></center>";
}
// Bình luận (Comment)
function cmt_tid() {
$ttime=time();
$sql="insert into `comments`(tid,content,uid,time) values('".mysql_escape_string($_POST['tid'])."','".mysql_escape_string($_POST["comment"])."','".$_SESSION["userid"]."','".$ttime."')";
$query=mysql_query($sql);
}
function cmt_it() {
$ttime=time();
$sql="insert into `comments`(it,content,uid,time) values('".mysql_escape_string($_POST['it'])."','".mysql_escape_string($_POST["comment"])."','".$_SESSION["userid"]."','".$ttime."')";
$query=mysql_query($sql);
}
// Đăng đề trắc nghiệm
function tposttest() {
$sqltest="SELECT * FROM `tests` where `id`='".$_GET['id']."' and `rt`=0";
$querytest=@mysql_query($sqltest);
if (@mysql_num_rows($querytest) != 0)
{
$sqltest="UPDATE `tests` set `time2`='".$_POST[time2]."', `rt`=1 where `id`='".$_GET['id']."' and `rt`=0";
$querytest=@mysql_query($sqltest);
for($i=1; $i<=$_GET[s]; $i++)
{
$sql="insert into `ques_parts`(it,content,answer,tf,score) values('".mysql_escape_string($_GET['id'])."','".mysql_escape_string($_POST["ques".$i.""])."','".mysql_escape_string($_POST["2ques".$i.""])."','".mysql_escape_string($_POST["tques".$i.""])."','".mysql_escape_string($_POST["sques".$i.""])."')";
$query=mysql_query($sql);
}
echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>Đăng đề trắc nghiệm thành công</form></div>";
header("refresh: 0; url=ttestlist.php" );
}
else {
echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>Có Lỗi</form></div>";
}
}
// Chỉnh sửa đề trắc nghiệm
function tedittest() {
$sqltest="SELECT * FROM `tests` where `id`='".$_GET['id']."' and `rt`=1";
$querytest=@mysql_query($sqltest);
if (@mysql_num_rows($querytest) != 0)
{
$sqltest2="UPDATE `tests` set `time2`='".$_POST[time2]."' where `id`='".$_GET['id']."'";
$querytest2=@mysql_query($sqltest2);
for($i=1; $i<=$_POST[ss]; $i++)
{
if (isset($_POST["id".$i.""]))
	{
		$sqledit="UPDATE `ques_parts` set `content`='".mysql_escape_string($_POST["ques".$i.""])."', `answer`='".mysql_escape_string($_POST["2ques".$i.""])."',`tf`='".mysql_escape_string($_POST["tques".$i.""])."',`score`='".mysql_escape_string($_POST["sques".$i.""])."' where `id`='".$_POST["id".$i.""]."'";
		$queryedit=@mysql_query($sqledit);
	}
	else
	{
		$sqlin="insert into `ques_parts`(it,content,answer,tf,score) values('".mysql_escape_string($_GET['id'])."','".mysql_escape_string($_POST["ques".$i.""])."','".mysql_escape_string($_POST["2ques".$i.""])."','".mysql_escape_string($_POST["tques".$i.""])."','".mysql_escape_string($_POST["sques".$i.""])."')";
		$queryin=mysql_query($sqlin);
	}
}
echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>Chỉnh sửa thành công</form></div>";
}
else {
echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>Có Lỗi</form></div>";
}
}
// Xóa đề trắc nghiệm
function tdeltest() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `ques_parts` where `it`='".$id."'";
$query=@mysql_query($sql);
$sqltest="UPDATE `tests` set `rt`=0 where `id`='".$id."' and `rt`=1";
$querytest=@mysql_query($sqltest);
$sqlhis="SELECT * from `test_history` where `it`='".$id."'";
$queryhis=@mysql_query($sqlhis);
while ($rowhis=@mysql_fetch_array($queryhis))
{
	$sqldel="delete from `ques_history` where `tid`='".$rowhis[id]."'";
	$querydel=@mysql_query($sql);
}
$sql="delete from `test_history` where `it`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=ttestlist.php" );
}
// Xóa kết quả trắc nghiệm
function tdeltesth() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `test_history` where `id`='".$id."'";
$query=@mysql_query($sql);
$sql="delete from `ques_history` where `tid`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=ttesthistory.php" );
}
// Chỉnh sửa bình luận
function editcmt() {
$sqlcmt="SELECT * FROM `comments` where `id`='".$_GET['id']."'";
$querycmt=@mysql_query($sqlcmt);
if (@mysql_num_rows($querycmt) != 0)
	{
	$sqlupdate="UPDATE `comments` set `content`='".mysql_escape_string($_POST["content"])."',`liked`='".mysql_escape_string($_POST["liked"])."',`uid_liked`='".mysql_escape_string($_POST["uid_liked"])."' where `id`='".$_GET['id']."'";
	$queryupdate=@mysql_query($sqlupdate);
	echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>Chỉnh sửa thành công</form></div>";
	}
	else {
echo "<div id='main'>
				<form action='' class='jNice' method='post' enctype='multipart/form-data'>
				<br/>Có Lỗi</form></div>";
}
}
// Xóa bình luận
function delcmt() {
$id=mysql_escape_string($_POST[id]);
$sql="delete from `comments` where `id`='".$id."'";
$query=@mysql_query($sql);
header("refresh: 0; url=cmtlist.php" );
}
?>