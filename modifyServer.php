<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 14:14
 */
header("Content-type: text/html; charset=utf-8");
require_once "mysql.php";
connectDb();
$id = $_POST['id'];
$img_url = $_POST['img_url'];
$title = $_POST['title'];
$message = $_POST['message'];
$message2 = $_POST['message2'];
$message3 = $_POST['message3'];

$sql="UPDATE combat SET img_url='$img_url',title='$title',message='$message' ,message2='$message2' ,message3='$message3' WHERE id=$id";


if (!mysql_query($sql)){
    die('Error: ' . mysql_error());
}
echo "修改一条记录";

mysql_close();

header("Location:combat.php");