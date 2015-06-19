<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 17:21
 */

header("Content-type: text/html; charset=utf-8");
require_once "mysql.php";
$id=$_GET['id'];
connectDb();
$result = mysql_query("SELECT * FROM content WHERE id=$id");
$result_arr = mysql_fetch_assoc($result);

echo json_encode($result_arr);

die();