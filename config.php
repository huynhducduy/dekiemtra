<?php
$db_host = "localhost"; // Giữ mặc định
$db_name    = 'dekiemtr_dekiemtra';// Thay Đổi
$db_username    = 'dekiemtr_dkt'; // Thay Đổi
$db_password    = 'hochiminh123'; // Thay Đổi
@mysql_connect("{$db_host}", "{$db_username}", "{$db_password}");
@mysql_select_db("{$db_name}");
@mysql_query("SET NAMES 'UTF8'");
?>