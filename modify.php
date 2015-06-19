<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<?php
header("Content-type: text/html; charset=utf-8");
require_once "mysql.php";

$id=$_GET['id'];
connectDb();
$result = mysql_query("SELECT * FROM combat where id=$id");
$result_arr = mysql_fetch_assoc($result);
$id = $result_arr['id'];
$title = $result_arr['title'];
$img_url = $result_arr['img_url'];
$message = $result_arr['message'];
$message2 = $result_arr['message2'];
$message3 = $result_arr['message3'];

?>

<body>
    <div class="container">
        <form action="modifyServer.php" method="post">
            <h2>信息修改</h2>
            <label for="exampleInputName2">id</label>
            <input type="text" name ="id" value="<?php echo $id ;?>"/>
            <br/>
            <label for="exampleInputName2">img_url</label>
            <input type="text" name ="img_url" value="<?php echo $img_url;?>"/>
            <br/>
            <label for="exampleInputName2">title</label>
            <input type="text" name="title" value="<?php echo $title;?>"/>
            <br/>
            <label for="exampleInputName2">message</label>
            <input class="form-control" type="text" name ="message" value="<?php echo $message;?>"/>
            <br/>
            <label for="exampleInputName2">message2</label>
            <input class="form-control" type="text" name ="message2" value="<?php echo $message2;?>"/>
            <br/>
            <label for="exampleInputName2">message3</label>
            <input  class="form-control" type="text" name ="message3" value="<?php echo $message3;?>"/>
            <br/>
            <input  class="btn btn-danger"   type="submit" value="确认修改"/>
        </form>
    </div>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 13:11
 */


