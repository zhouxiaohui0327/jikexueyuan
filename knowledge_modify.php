<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
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
$id = $result_arr['id'];
$img_url = $result_arr['img_url'];
$message = $result_arr['message'];
$class = $result_arr['class'];
?>
<body>
<div style="width:1000px;margin:200px auto;" >
    <form action="knowledge_modifyServer.php" method="post" class="form-inline">
        <h2>信息修改</h2>
        <div class="form-group">
            <label for="exampleInputName2">id:</label>
            <input class="form-control" type="text" name ="id" value="<?php echo $id;?>"/>
        </div>
        <br/>
        <div class="form-group">
            <label for="exampleInputName2">img_url:</label>
            <input class="form-control" type="text" name ="img_url" value="<?php echo $img_url;?>"/>
        </div>
        <br/>
        <div class="form-group">
            <label for="exampleInputName2">message:</label>
            <input class="form-control" type="text" name ="message" value="<?php echo $message;?>"/>
        </div>
        <br/>
        <div class="form-group">
            <label for="exampleInputName2">class:</label>
            <input class="form-control" type="text" name ="class" value="<?php echo $class;?>"/>
        </div>
        <br/>
        <input class="btn btn-default" type="submit" value="确认修改">
    </form>
</div>
</body>
</html>
