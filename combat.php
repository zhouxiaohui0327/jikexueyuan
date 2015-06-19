<?php
require_once "mysql.php";

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/6/14
 * Time: 9:32
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="js/jquery-2.1.4.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script>
        function del_confirm(a){
            if(confirm("确定要删除吗？")){
                var id = a;
                $.ajax({
                    url: 'http://127.0.0.1/jikexueyuan/delete.php?id=' + a,
                    type : 'post',
                    data : {id: a},
                    dataType: 'json',
                    success:function(result){
                    if(result.state) {
                        $("table tr."+a).hide(1000);
                    } else {
                        alert(result.data)
                    }
                }
                })
            }else{
                return false;
            }
        }
    </script>
</head>
<body>

    <?php
    connectDb();
    $limit =8;
    $b = 3 ;

    if(!isset($_GET['page'])){
        $page=1;
    }else {
        $page = $_GET['page'];
    }

    $count=mysql_query("SELECT * FROM combat");
    $totalNumber = mysql_num_rows($count);
    $totalPage=ceil($totalNumber/$limit);
    $startCount=($page-1)*$limit;
    $result=mysql_query("SELECT * FROM combat limit $startCount,$limit ");

?>
<div class="container" style="margin-top: 20px">
    <table border="1"  class="table table-hover">
    <thead ><tr class="danger">
    <th>id</th>
    <th>img_url</th>
    <th>title</th>
    <th>message</th>
    <th>message2</th>
    <th>message3</th>
    <th>操作</th>
    </tr></thead>
        <?php
    while ($row=mysql_fetch_array($result)) {
        echo "<tr class='$row[0]'>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td><a class='btn btn-danger btn-sm' role='button' href='javascript:del_confirm($row[0])'>删除</a>
              <a class='btn btn-success btn-sm' role='button' href='modify.php?id=$row[0]'>修改</a></td>";
        echo "</tr>";
    }
    echo "</table>";
        ?>
        <div class="container">
    <nav>
        <ul class="pagination">
            <li>
                <a href="feed.php?page=<?php echo $page - 1;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            for ($i=$page;$i<=$page+$b&&$i<=$totalPage;$i++) {
                ?>
                <li><a href="feed.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
            <?php
            }
            ?>
        <?php
        if($page>=$totalPage){
            ?>
            <li>
                <a aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                <span><?php echo "共（".$totalNumber."）条"."(".$totalPage.")"."页";?></span>
            </li>
        <?php
        }else {
            ?>
            <li>
                <a href="feed.php?page=<?php echo $page + 1;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                <span><?php echo "共（" . $totalNumber . "）条" . "(" . $totalPage . ")" . "页";?></span>
            </li>
        <?php
        }
        ?>
        </ul>
        </nav>

</div>
     <div class="container">
         <form action="combatServer.php"  method="POST" class="form-inline">
             <label for="exampleInputFile">id：</label>
             <input class="form-control" type="text" name="id"/>
             <label for="exampleInputFile">title：</label>
             <label for="exampleInputFile">img_url：</label>
             <input class="form-control" type="text" name="img_url"/>
             <label for="exampleInputFile">title：</label>
             <input class="form-control" type="text" name="title"/>
             <br/>
             <label for="exampleInputFile">message：</label>
             <input class="form-control" type="text" name="message"/>
             <label for="exampleInputFile">message2：</label>
             <input class="form-control" type="text" name="message2"/>
             <label for="exampleInputFile">message3：</label>
             <input class="form-control" type="text" name="message3"/>
             <br/>
             <input type="submit"  class="btn btn-info" value="提交"/>
         </form>
     </div>
</body>
</html>

