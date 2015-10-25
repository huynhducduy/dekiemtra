<?php
require_once("config.php");
if (isset($_POST['cg3']))
{
$sql="SELECT * FROM `cate2` where `id3`='".$_POST['cg3']."'";
$query=@mysql_query($sql); 
echo "<option value='0'>Lựa chọn</option>";
while($row=@mysql_fetch_array($query))
{
echo "<option value='".$row['id']."'>".$row['title']."</option>";
}
}
if (isset($_POST['cg2']))
{
$sql="SELECT * FROM `cate1` where `id2`='".$_POST['cg2']."'"; 
$query=@mysql_query($sql);
echo "<option value='0'>Lựa chọn</option>";
while($row=@mysql_fetch_array($query))
{
echo "<option value='".$row['id']."'>".$row['title']."</option>";
}
}
?>