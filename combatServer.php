<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 9:38
 */

header("Content-type: text/html; charset=utf-8");
$id = $_POST['id'];
$img_url = $_POST['img_url'];
$title = $_POST['title'];
$message = $_POST['message'];
$message2=$_POST['message2'];
$message3=$_POST['message3'];

require_once "mysql.php";
connectDb();
$sql="INSERT INTO combat(id,img_url,title,message,message2,message3)VALUES('$id','$img_url','$title','$message','$message2','$message3')";
if (!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}
echo "添加一条记录";

mysql_close();


header("Location:combat.php");