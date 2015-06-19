
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/15
 * Time: 11:45
 */

header("Content-type:text/html;charset=utf-8");
require_once"mysql.php";
connectDb();
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM knowledge WHERE id=$id");
$result_arr = mysql_fetch_assoc($result);

echo json_encode($result_arr);
die();

