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
function get_list($table_name,$limit){

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $startCount = ($page - 1) * $limit;
    $list = array();
    $query = mysql_query("SELECT * FROM $table_name order by id desc  limit $startCount,$limit");
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
$knowledge_list=get_list('knowledge','10');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="js/jquery-2.1.4.js"></script>
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
<div id="modifyContent" style="display:none;
    position: absolute;
    text-align: center;
    background-color: #35b558;
    opacity: .9;
    top: 170px;
    left: 550px;
    width: 215px;
    height: 300px;
    z-index: 101;
    border-radius: 30px;">
    <form class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">id:</label>
            <input class="form-control" type="text" name ="id" value=""/>
        </div>
        <br/>
        <div class="form-group">
            <label for="exampleInputName2">img_url:</label>
            <input class="form-control" type="text" name ="img_url" value=""/>
        </div>
        <br/>
        <div class="form-group">
            <label for="exampleInputName2">message:</label>
            <input class="form-control" type="text" name ="message" value=""/>
        </div>
        <br/>
        <div class="form-group">
            <label for="exampleInputName2">classHour:</label>
            <input class="form-control" type="text" name ="classHour" value=""/>
        </div>
        <br/>
        <br/>
        <input class="btn btn-default" type="button" id="modifyBtn" value="确认修改">
        <input class="btn btn-default cancelBtn" type="button"  value="取消">
        <script>
            $(document).ready(function(){
                $('#modifyBtn').click(function(){
                    var id=$('input[name=id]').val();
                    var img_url=$('input[name=img_url]').val();
                    var message=$('input[name=message]').val();
                    var classHour=$('input[name=classHour]').val();
                    console.log(classHour);
                    console.log(id);
                    console.log(message);
                    console.log(img_url);
                    $.ajax({
                        url:'knowledge_modifyServer.php',
                        type:'post',
                        data:{id:id,img_url:img_url,message:message,classHour:classHour},
                        dataType:'json',
                        success:function(result){
                            if(result.state){
                                $("#modifyContent").hide();
                                $("tr."+id).find("td").eq(1).html(img_url);
                                $("tr."+id).find("td").eq(2).html(message);
                                $("tr."+id).find("td").eq(3).html(classHour);
                            }else{
                                alert(result.data);
                            }
                        }
                    })
                })
            })
        </script>
<!--          点击取消 关闭修改页面-->
       <script>
           $(document).ready(function(){
               $('.cancelBtn').click(function(){
                   $('#modifyContent').hide();
               })
           })
       </script>
    </form>
</div>
    <div class="container" style="margin-top:20px">
        <table  class="table table-striped">
            <tr class="warning">
                <th>id</th>
                <th>img_url</th>
                <th>message</th>
                <th>classHour</th>
                <th>操作</th>
            </tr>
            <?php foreach($knowledge_list as $row):;?>
            <tr class="<?php echo $row['id'];?>">
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['img_url'];?></td>
                <td><?php echo $row['message'];?></td>
                <td><?php echo $row['classHour'];?></td>
                <td><a class="btn btn-danger btn-xs" href='javascript:del_confirm(<?php echo $row['id'];?>)'>删除</a>
                    <a class="btn btn-default btn-xs modifyBtn" modifyId=<?php echo $row['id'];?>>修改</a></td>
            </tr>
            <?php endforeach;?>
        </table>
<!--        点击修改弹出修改页面-->
        <script>
            $(document).ready(function(){
                $('.modifyBtn').click(function(){
                    var modifyId=$(this).attr('modifyId');
                    $.get('knowledge_modify.php?id='+modifyId,function(result){
                        var x= $.parseJSON(result);
                        $('#modifyContent input[name=id]').val(x.id);
                        $('#modifyContent input[name=img_url]').val(x.img_url);
                        $('#modifyContent input[name=message]').val(x.message);
                        $('#modifyContent input[name=classHour]').val(x.classHour);
                        $('#modifyContent').css("display","block");
                    })
                })
            })
        </script>
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
                <label for="exampleInputName2">classHour:</label>
                <input class="form-control" type="text" name="classHour"/>
            </div>
            <input type="submit" value="确认添加"/>
        </form>
    </div>
</body>
</html>


