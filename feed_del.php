<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 17:11
 */

header("Content-type: text/html; charset=utf-8");
require_once "mysql.php";
$id=$_GET['id'];
connectDb();
function del($tableName,$where){
    $del =   mysql_query("DELETE FROM $tableName WHERE $where");
    return $del;
}
$del_content = del('content',"id='$id'");
if($del_content){
    $result=array();
    $result['state'] = true;
    $result['data'] = '删除成功';
    echo json_encode($result);
    die();
}else{
    $result=array();
    $result['state'] = false;
    $result['data'] = '删除失败';
    echo json_encode($result);
    die();
}
//mysql_close();
//header('Location:feed.php');
