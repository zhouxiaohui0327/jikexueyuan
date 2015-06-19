<?php
require_once "mysql.php";
header("Content-type: text/html; charset=utf-8");
connectDb();
function get_list($table_name,$offset,$limit,$orderBy="order by id asc") {
    $list = array();
    $query = mysql_query("SELECT * FROM $table_name $orderBy limit  $offset,$limit");
    $count = mysql_num_rows($query);
    if($count <= 0) {
        return $list;
    } else {
        for($i = 0; $i<$count; $i++) {
            $list[] = mysql_fetch_assoc($query);
        }
        return $list;
    }
}
$recommend_list = get_list('content',0,8);
$knowledge_list = get_list('knowledge',0,10);
$combat_list = get_list('combat',0,5);


/*
$result=mysql_query("SELECT * FROM content");
$dataCount = mysql_num_rows($result);
$recommend_list = array();
for($i = 0;$i <$dataCount;$i++) {
    $result_arr = mysql_fetch_assoc($result);
    $recommend_list[] = $result_arr;
}

$knowledge_list = array();
$result = mysql_query("SELECT * FROM knowledge");
$dataCount = mysql_num_rows($result);
for($i = 0;$i <$dataCount;$i++) {
    $result_arr = mysql_fetch_assoc($result);
    $knowledge_list[] = $result_arr;
}
*/