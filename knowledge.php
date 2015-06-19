<?php
require_once"mysql.php";
connectDb();
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$limit = 10;
$count=mysql_query("SELECT * FROM knowledge");
$totalNumber = mysql_num_rows($count);
$totalPage=ceil($totalNumber/$limit);
$b = 3 ;
function get_list($table_name,$orderBy="order by id asc",$limit){

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $startCount = ($page - 1) * $limit;
    $list = array();
    $query = mysql_query("SELECT * FROM $table_name $orderBy limit $startCount,$limit");
    $count1 = mysql_num_rows($query);
    if ($count1 <= 0) {
        return $list;
    } else {
        for ($i = 0; $i < $count1; $i++) {
            $list[] = mysql_fetch_assoc($query);
        }
        return $list;
    }
}
$knowledge_list=get_list('knowledge','','10');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script>
        function del_confirm(a){
            if(confirm("确定要删除吗？")){
                window.self.location="knowledge_del.php?id="+a
            }else{
                return false
            }
        }
    </script>
</head>
<body>
    <div class="container" style="margin-top:20px">
        <table  class="table table-striped">
            <tr class="warning">
                <th>id</th>
                <th>img_url</th>
                <th>message</th>
                <th>class</th>
                <th>操作</th>
            </tr>
            <?php foreach($knowledge_list as $row):;?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['img_url'];?></td>
                <td><?php echo $row['message'];?></td>
                <td><?php echo $row['class'];?></td>
                <td><a class="btn btn-danger btn-xs" href='javascript:del_confirm(<?php echo $row['id'];?>)'>删除</a>
                    <a class="btn btn-default btn-xs" href="knowledge_modify.php?id=<?php echo $row['id'];?>">修改</a></td>
            </tr>
            <?php endforeach;?>
        </table>
        <div>
            <nav>
                <ul class="pagination">
                    <li>
                        <a href="knowledge.php?page=<?php echo $page - 1;?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                    for ($i=$page;$i<=$page+$b&&$i<=$totalPage;$i++) {
                        ?>
                        <li><a href="knowledge.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="knowledge.php?page=<?php echo $page + 1;?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span><?php echo "共（".$totalNumber."）条"."(".$totalPage.")"."页";?></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    <div class="container">
        <form class="form-inline" action="knowledgeServer.php" method="POST">
            <div class="form-group">
                <label for="exampleInputName2">img_url</label>
                <input class="form-control" type="text" name="img_url"/>
            </div>
            <div class="form-group">
                <label for="exampleInputName2">message:</label>
                <input class="form-control" type="text" name="message"/>
            </div>
            <div class="form-group">
                <label for="exampleInputName2">class:</label>
                <input class="form-control" type="text" name="class"/>
            </div>
            <input type="submit" value="确认添加"/>
        </form>
    </div>
</body>
</html>


