<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/15
 * Time: 11:54
 */

header("Content-type: text/html; charset=utf-8");
require_once "mysql.php";
connectDb();
$id = $_POST['id'];
$img_url = $_POST['img_url'];
$message = $_POST['message'];
$class = $_POST['class'];

$sql="UPDATE knowledge SET img_url='$img_url',message='$message' ,class='$class' WHERE id=$id";


if (!mysql_query($sql)){
    die('Error: ' . mysql_error());
}
echo "修改一条记录";

mysql_close();

header("Location:./knowledge.php");