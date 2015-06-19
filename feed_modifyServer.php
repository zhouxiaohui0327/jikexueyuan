<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 17:30
 */
header("Content-type: text/html; charset=utf-8");
require_once "mysql.php";
connectDb();
$id = $_POST['id'];
$img_url = $_POST['img_url'];
$message = $_POST['message'];
$classHour = $_POST['classHour'];
$time =date("Y-m-d H:i:s");
$sql="UPDATE content SET last_time='$time', img_url = '$img_url',message ='$message', classHour = '$classHour' WHERE id=$id";

if(mysql_query($sql)){
    $result=array();
    $result['state']=true;
    $result['data']='修改成功';

    echo json_encode($result);
    die();
}else{
    $result=array();
    $result['state']=false;
    $result['data']='修改失败';
    echo json_encode($result);
    die();
}
