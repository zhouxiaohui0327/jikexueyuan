<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/19
 * Time: 12:31
 */

header("Content-type:text/html;charset=utf-8");
$time=$_POST['time'];
$id=$_GET['id'];
require_once"mysql.php";
connectDb();
$sql="UPDATE content SET last_time='$time'WHERE id=$id";
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
