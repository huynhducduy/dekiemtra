<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); 
require_once("../online.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bảng điều khiển quản trị</title>
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
	<div id="wrapper">
        <ul id="mainNav">
			<li><a href='index2.php' id='x1'>Trang chủ</a></li>
			<li><a href='basic.php' id='x2'>Thiết lập</a></li>
        	<li><a href='categorylist.php' id='x3'>Danh mục</a></li>
        	<li><a href='testlist.php' id='x4'>Đề kiểm tra</a></li>
			<li><a href='ttestlist.php' id='x7'>Trắc nghiệm</a></li>
			<li><a href='cmtlist.php' id='x8'>Bình luận</a></li>
			<li><a href='userlist.php' id='x5'>Thành viên</a></li>
        	<li class='logout'><a href='logout.php' id='x6'>Thoát</a></li>
        </ul>
        <div id='containerHolder'>
			<div id='container'>        		
				<div id='sidebar'>
                	<ul class='sideNav'>