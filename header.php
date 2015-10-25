<?php
// strtoupper(), strtolower(), ucfirst() và ucwords()
// $_SERVER['REQUEST_URI'] 
// $_SERVER['PHP_SELF'] 
// $_SERVER['SCRIPT_NAME']
// $_SERVER['HTTP_HOST']
// $_SERVER['QUERY_STRING']
view_up();
require_once("online.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi">
<head><base href="<?php echo settings("url"); ?>" />
<link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
<title><?php if ($title != "") { echo $title." - ".settings("description"); } else { echo settings("description"); }?></title>
<meta property='og:title' content='<?php if ($title != "") { echo $title." - ".settings("description"); } else { echo settings("description"); }?>'/>
<meta name="description" class="description" content="<?php if ($description != "") { echo $description." - ".settings("description"); } else { echo settings("description"); }?>" />
<meta property='og:description' class="description" content='<?php if ($description != "") { echo $description." - ".settings("description"); } else { echo settings("description"); }?>' />
<meta name="abstract" class="description" content="<?php if ($description != "") { echo $description." - ".settings("description"); } else { echo settings("description"); }?>">
<meta name="keyword" class="keyword" content="<?php if ($keyword != "") { echo $keyword.",".settings("keyword"); } else { echo settings("keyword"); }?>" />
<meta property='og:url' content='<?php echo settings("url").$_SERVER['REQUEST_URI']; ?>'/>
<link rel="canonical" href="<?php echo settings("url").$_SERVER['REQUEST_URI']; ?>" />
<meta property='og:image' content='<?php echo settings("logo"); ?>' />
<link rel="image_src" href="<?php echo settings("logo"); ?>" />
<meta name="generator" content="Notepad++" />
<meta name="copyright" content="<?php echo settings("author"); ?>" />
<meta name="author" content="<?php echo settings("author"); ?>" />
<meta property='og:site_name' content='<?php echo settings("domain"); ?>' />
<meta property='og:locale' content='vi_VN' />
<meta property='og:type' content='website'/>
<meta property='fb:admins' content='<?php echo settings("fb_id_admin"); ?>' />
<!-- <meta property='fb:moderator' content='<?php echo settings("fb_id_mod"); ?>' /> -->
<meta prefix="fb: http://ogp.me/ns/fb#" property='fb:app_id' content='<?php echo settings("fb_id_app"); ?>' />
<meta property="article:author" content="http://www.facebook.com/<?php echo settings("fb_id_page"); ?>" />   
<meta property="article:publisher" content="http://www.facebook.com/<?php echo settings("fb_id_page"); ?>" />    
<meta http-equiv="Page-Exit" content="BlendTrans(Duration=0)" /> 
<meta http-equiv="Page-Enter" content="BlendTrans(Duration=0)" />  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Language" content="vi" />
<meta name="rating" content="good for student">
<meta name="reply-to" content="<?php echo settings("admin_mail"); ?>">
<meta name="geo.placename" content="Việt Nam">
<meta name="geo.region" content="vn">
<meta name="Language" content="vietnamese" />
<meta name="distribution" content="global" />
<meta name="google" content="notranslate" />
<meta name="resource-type" content="document" /> 
<meta name="language" content="Vietnamese" /> 
<meta name="robots" content="all" /> 
<meta name="classification" content="SEO" />
<!-- <link rel="alternate" type="application/rss+xml" title="<?php echo settings("description");?> RSS Feed" href="Link RSS" /> -->
<style type="text/css" media="all">@import "style/style.css";</style>
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600&subset=latin,latin-ext,vietnamese' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script> -->
<script type="text/javascript" src="./js/jquery-2.1.0.js"></script>
<script type="text/javascript" src="./js/jquery-2.1.0.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script>
/*
CSS Browser Selector v0.4.0 (Nov 02, 2010)
Rafael Lima (http://rafael.adm.br)
http://rafael.adm.br/css_browser_selector
License: http://creativecommons.org/licenses/by/2.5/
Contributors: http://rafael.adm.br/css_browser_selector#contributors
*/
function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);
</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=130123813864778";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49666056-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<script type="text/javascript">
window.onload=function(){setTimeout(function(){$('#loading').fadeOut('slow')},1000)}
 $(function(){
    $('#form_close2').click(function(){
        $('#form2').fadeOut()
        $('#overlay').hide()
    })
    center_form();$(window).resize(function(){center_form()})
    function center_form(){
        var $wid=$(window).width()
        var $hei=$(window).height()
        $('#form2').each(function(){
            $(this).css({'left':($wid-$(this).width())/2,'top':($hei-$(this).height())/2})
        })
    }
 })
</script>
<script type="text/javascript" src="./lightbox/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./lightbox/jquery.lightbox.css">
<script type="text/javascript" src="./lightbox/jquery.lightbox.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
$('.lightbox').lightbox();
});
</script> 
<body>
<?php
if ($_SESSION["userid"] != NULL)
{
echo "<a href='./dong-gop-de-kiem-tra'><div class='upload'>Đóng góp đề kiểm tra</div></a>";
}
?>
<div id="overlay"></div>
<div id="loading">
<div class="loading"><p style="margin-top:45px; font-size: 1.3em;"><b>Đang tải dữ liệu ...</b></p></div>
</div>
<!-- <script type="text/javascript" src="./js/ads.js"></script> -->
<div id="fbdivcevherlink" class="cevherlink">
<div id="cevher_text">Quảng cáo</div>
<div id="cevher_middle"></div>
<div id="cevherlink">
<ul id='slideshow'>
<?php
$x = explode('*|*',settings("ads_2"));
foreach($x as $value) {
$i++;
$y = explode('|',"|".$value);
if ($i == 1) { echo "<li class='current-slide'>"; } else { echo "<li>"; }
echo "
<a href='".$y[2]."' rel='nofollow'>
<img src='./images/".$y[1]."' width='300px' height='290px' alt='".$y[3]."' title='".$y[3]."'/>
</a>
</li>";
}
?>
</ul>
</div>
<a href="javascript:void(0);" id="fbprevbtn"><img src="./images/ads/prev.png" class="fbprevbtn"></a>
<a href="javascript:void(0);" id="fbnextbtn"><img src="./images/ads/play.png" class="fbnextbtn"></a>
<div id="cevher_close"><img src="./images/ads/close.png" width="16" height="16"></div>
</div>
<div id="container">
	<div id="wrapglossy">
		<div id="wrapcontentinner">
			<div id="wrapper">
				<div id="header">	
					<a href="./" class="replace" id="logo"><span></span>Dekiemtra.Net</a>
				</div>
				<div id="placemainmenu">
					<ul id="mainmenu">
						<li><a href="./">Trang chủ</a></li>
						<li><a href="./gioi-thieu">Giới thiệu</a></li>
						<li><a>Danh mục đề kiểm tra</a>
							<div class="dropdown1">
								<div class="dropdowntop"></div>
								<div class="dropdownbottom">
									<ul class="menudrop1">
<?php
$sql="SELECT * FROM `cate3`"; 
$query=@mysql_query($sql); 
while($row=@mysql_fetch_array($query))
{
echo "									<li><a href='./".strtolower(str_filter($row[title])).".".$row[id]."'>".$row[title]."</a>
											<div class='dropdown2'>
												<div class='dropdowntop'></div>
												<div class='dropdownbottom'>
													<ul class='menudrop2'>";
	$sql2="SELECT * FROM `cate2` where `id3`='".$row[id]."'"; 
	$query2=@mysql_query($sql2); 
	while($row2=@mysql_fetch_array($query2))
	{
	echo "												<li><a href='./".strtolower(str_filter($row[title]))."/".strtolower(str_filter($row2[title])).".".$row2[id]."'>".$row2[title]."</a>
															<div class='dropdown3'>
																<div class='dropdowntop'></div>
																<div class='dropdownbottom'>
																	<ul class='menudrop3'>";
		$sql3="SELECT * FROM `cate1` where `id2`='".$row2[id]."'"; 
		$query3=@mysql_query($sql3); 
		while($row3=@mysql_fetch_array($query3))
		{
			echo "														<li><a href='./".strtolower(str_filter($row[title]))."/".strtolower(str_filter($row2[title]))."/".strtolower(str_filter($row3[title])).".".$row3[id]."'>".$row3[title]."</a></li>";
		}
	echo "															</ul>
																	<div class='clear'></div>
																</div>
															</div>
														</li>";
	}
echo "												</ul>
													<div class='clear'></div>
												</div>
											</div>
										</li>";
}
?>
									</ul>
									<div class="clear"></div>
								</div>
							</div>
						</li>
						<li><a href="./lien-he">Liên hệ</a></li>
						<!-- <li><a href="./tro-giup">Trợ giúp</a></li> -->
						<div style="float: right;">
						<li>&nbsp;</li>
						<?php
									if ($_SESSION["userid"] == NULL)
									{	
										$x=explode('?'.$_SERVER['QUERY_STRING'],'?'.$_SERVER['QUERY_STRING'].$_SERVER['REQUEST_URI']);
										if ($x[1] == "/dang-nhap")
										{
										echo "<li><a href='./dang-nhap'>Đăng nhập</a></li>";
										echo "<li><a href='./dang-ky'>Đăng ký</a></li>";
										}
										else
										{
										echo "<li><a href='./dang-nhap?goto=".$_SERVER['REQUEST_URI']."'>Đăng nhập</a></li>";
										echo "<li><a href='./dang-ky?goto=".$_SERVER['REQUEST_URI']."'>Đăng ký</a></li>";
										}
										
									}
									else
									{
if (logging_account(avatar) == NULL)
{
$avatar="./images/noavatar.jpg";
}
else
{
$avatar=logging_account(avatar);
}
										echo "
										<li><a href='./thong-tin-thanh-vien-".strtolower(str_filter(account($_SESSION["userid"],username)))."-".$_SESSION["userid"]."' class='username'>
												<img class='img2' width='30px' height='30px' src='".$avatar."'>
												<span>".logging_account(username)."</span>
												</a>
												<div class='dropdown1'>
												<div class='dropdowntop'></div>
												<div class='dropdownbottom'>
												<ul class='menudrop1'>
													<li><a href='./danh-sach-de-da-dong-gop-cua-".strtolower(str_filter(account($_SESSION["userid"],username)))."-".$_SESSION["userid"]."'>Danh sách đề đã đóng góp</a></li>
													<li><a href='./danh-sach-de-da-tai-cua-".strtolower(str_filter(account($_SESSION["userid"],username)))."-".$_SESSION["userid"]."'>Danh sách đề đã tải</a></li>
													<li><a href='./thay-doi-thong-tin-thanh-vien'>Sửa thông tin cá nhân</a></li>
													<li><a href='./doi-mat-khau'>Đổi mật khẩu</a></li>
													<li><a href='./dang-xuat'>Đăng xuất</a></li>
													<div class='clear'></div>
													</ul>
												</div>
												</div>
												</li>";
									}
						?>
						</div>
					</ul>
				</div>
				<br/>
<ul id="breadcrumb">
		<li><a href="./" title="ĐềKiểmTra.Net">ĐềKiểmTra.Net</a></li>
		<?php
		if ($title4 != "")
		{
		echo "<li><a href='".$link4."' title='".$title4."' id='title4'>".$title4."</a></li>";
		}
		if ($title3 != "")
		{
		echo "<li><a href='".$link3."' title='".$title3."' id='title3'>".$title3."</a></li>";
		}
		if ($title2 != "")
		{
		echo "<li><a href='".$link2."' title='".$title2."' id='title2'>".$title2."</a></li>";
		}
		?>
		<li class="current" id="brcur"><?php echo $title ?></li>
</ul>
				<div id="content">
				<div id="nav">
						<div class="boxnavsearch">
<script>
  (function() {
    var cx = '<?php echo settings(gcseid); ?>';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
<div class="clear"></div>
						</div>
						<div class="boxnav">
						<h3 class="titlenav"><a href="#" class="menuitem submenuheader">Đăng ký nhận đề kiểm tra mới</a></h3>
						<p style="font-size: 1.3em;padding: 5px 5px 0 5px;">Nếu bạn quá bận mà không có thời gian để truy cập vào website hằng ngày thì có thể đăng ký nhận đề kiểm tra mới mỗi ngày ở đây!</p>
						<div style="text-align:center;padding-top:6px;padding-bottom:6px;">
						<form method="post" action="" name='sub'>
							<input class="textbox2" type="email" name="emailxxx" placeholder="Nhập địa chỉ email..." autocomplete="off" required>&nbsp;&nbsp;
							<button type='submit' name='sub' style='background-color: #fff; border: 0;' ><input width="25px" height="25px" type="image" onclick='document.getElementById("sub").submit();' style='margin: -6px; background-color: #fff;' src="./images/sub.png" alt="Gửi" title="Gửi"></input></button>
							<br/>
						</form>
						<div id="form2">
						<h3>Đăng ký nhận đề kiểm tra mới</h3>
						<div>
							<span id="form_content2"> 
							</span>
						</div>
						<span id="form_close2"></span>
						</div>
						<?php
						if(isset($_POST["emailxxx"]))
						{
						sub();
						}
						?>
						</div>
							<div class="clear"></div>
						</div>
						<div class="boxnav">
							<h3 class="titlenav" style="margin-bottom: -2px;"><a href="#" class="menuitem submenuheader">Danh mục đề kiểm tra</a></h3>
		<ul class="navigation">
		<?php
if ($this3 == NULL)
{
$this3=1;
}
$sql="SELECT * FROM `cate3`"; 
$query=@mysql_query($sql);
$i=0;
while($row=@mysql_fetch_array($query))
{
$i++;
echo "<li>";
if ($i == $this3)
{
echo "<a href='./".strtolower(str_filter($row[title])).".".$row[id]."' class='on'>".$row[title]."</a><ul style='display: block;'>";
}
else { echo "<a href='./".strtolower(str_filter($row[title])).".".$row[id]."'>".$row[title]."</a><ul>"; }
	$sql2="SELECT * FROM `cate2` where `id3`='".$row[id]."'"; 
	$query2=@mysql_query($sql2);
	while($row2=mysql_fetch_array($query2))
	{
		echo "<li><a href='./".strtolower(str_filter($row[title]))."/".strtolower(str_filter($row2[title])).".".$row2[id]."'>".$row2[title]."</a></li>";
	}
	echo "
		</ul>
	</li>";
}
?>
		</ul>
<script>
(function($){
	$('.navigation > li').find('ul').each(function(){
		$(this).parent().addClass('lv2');
	})
	$('.lv2 > a').click(function(e){
		e.preventDefault();
		el = $(this);
		if(!el.hasClass('on')){
			$('.on').removeClass('on').next().stop(false,true).slideUp(400);
			el.addClass('on').next().stop(false,true).slideDown(400);
		}else{
			$('.on').removeClass('on').next().stop(false,true).slideUp(400);
		}
	})
})(jQuery);
</script>
							<div class="clear"></div>
						</div>
						<div class="boxnav">
							<h3 class="titlenav">Đề kiểm tra được xem nhiều</a></h3>
							<?php
							$sqlmost="SELECT * FROM `tests` order by `view` DESC LIMIT 0,6";
							$querymost=@mysql_query($sqlmost);
							while ($rowmost=@mysql_fetch_array($querymost))
							{
							echo "
							<ul style='margin: 6px;'>
							<li style='padding-bottom: 4px;'>
							<table>
							<tr>
							<td>
							<a href='./".strtolower(str_filter($rowmost['title'])).".".$rowmost['id'].".php'>
							<img src='".$rowmost['thumb']."' width='40' height='40' class='img' style='margin-right: 5px;'>
							</a></td>
							<td>
							<a href='./".strtolower(str_filter($rowmost['title'])).".".$rowmost['id'].".php'>
							<p style='font-size: 1.3em;'>
							".cu_t($rowmost['title'],90)."
							</p>
							</a>
							</td>
							</tr>
							</table>
							</li>
							</ul>";
							}
							?>
							<div class="clear"></div>
						</div>
						<div class="boxnav">
							<h3 class="titlenav">Like us on Facebook</a></h3>
							<div class="fb-like-box" data-href="https://www.facebook.com/<?php echo settings("fb_id_page"); ?>" data-width="288" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
							<div class="clear"></div>
						</div>
						<div class="boxnav">
							<h3 class="titlenav">Thống kê</h3>
							<ul class="menunav">
								<li><a><b class='Statistics'><?php echo user_count(); ?></b> Thành viên</a></li>
								<li><a><b class='Statistics'><?php echo test_count(); ?></b> Đề kiểm tra</a></li>
								<li><a><b class='Statistics'><?php echo download_count();?></b> Lượt download</a></li>
								<li style="margin-bottom: -14.6px; border-bottom-color: #cfcdcd; padding-bottom: 2px;"><a><b class='Statistics'><?php echo settings(view); ?></b> Lượt truy cập</a></li>
								<br/>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="boxnav">
							<h3 class="titlenav">Quảng cáo</h3>
							<div style="text-align:center;padding-top:20px;padding-bottom:20px;">
							<?php
							$x = explode('*|*',settings("ads_1"));
							foreach($x as $value) {
							$y = explode('|',"|".$value);
							echo "<a href='".$y[2]."' rel='nofollow'><img src='./images/".$y[1]."' width='250' alt='".$y[3]."' title='".$y[3]."'/></a><br/>";
							}
							?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div id="maincontent">
						<div id="placecontentin">