<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/13
 * Time: 15:14
 */

header("Content-type: text/html; charset=utf-8");

$id = $_POST['id'];
$img_url =$_POST['img_url'];
$small_icon =$_POST['small_icon'];
$message = $_POST['message'];
$classHour = $_POST['classHour'];
require_once "mysql.php";
connectDb();
$sql="INSERT INTO content(id,img_url,small_icon,message,classHour)VALUES('$id','$img_url','$small_icon','$message','$classHour')";
if (!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}
echo "添加一条记录";

mysql_close();

header("Location:./feed.php");



