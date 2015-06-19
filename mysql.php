<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/12
 * Time: 23:59
 */



function connectDb(){
    $con = mysql_connect('localhost','root','root');
    if(!$con){
        die('can not connect db');
    }
    mysql_select_db('jikexueyuan');
    mysql_query("SET NAMES 'utf8'");
    return $con;
}

