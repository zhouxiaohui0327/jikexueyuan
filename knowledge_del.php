<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 21:45
 */
header("Content-type:text/html;charset=utf-8");
require_once"mysql.php";
$id = $_GET['id'];
connectDb();
function del($tableName,$where){
    $del =  mysql_query("DELETE FROM $tableName WHERE $where");
    return $del;
}
$del_combat = del('knowledge',"id='$id'");
mysql_close();
header('Location:./knowledge.php');
