<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/15
 * Time: 11:09
 */
header("Content-type:text/html;charset=utf-8");
$img_url = $_POST['img_url'];
$message = $_POST['message'];
$class = $_POST['class'];
require_once"mysql.php";
connectDb();
$sql="INSERT INTO knowledge (img_url,message,class) VALUES('$img_url','$message','$class')";

if (!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}
echo "添加一条记录";
mysql_close();
header("Location:./knowledge.php");