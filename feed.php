<?php
   require_once "mysql.php";
connectDb();
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$limit = 8;
$count=mysql_query("SELECT * FROM content");
$totalNumber = mysql_num_rows($count);
$totalPage=ceil($totalNumber/$limit);
$b = 3 ;
function get_list($table_name){
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $limit=8;
    $startCount = ($page - 1) * $limit;
    $list = array();
    $query = mysql_query("SELECT * FROM $table_name order by id desc limit $startCount ,$limit");
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
$feed_list=get_list('content');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/feed.css" type="text/css">
    <script src="js/jquery-2.1.4.js"></script>
    <script>
        function del_confirm(a){
            if(confirm('确定要删除吗？')){
                var id = a;
                $.ajax({
                    url : 'feed_del.php?id='+id,
                    data : {id:id},
                    dataType : 'json',
                    success : function(result){
                        if(result['state']){
//                            $("tr."+a).remove();
                            window.location.href="feed.php";
                        }else{
                            alert(result.data);
                        }
                    }
                })
            }else{
            return false;
            }
        }
    </script>
    <script>

//        取消修改,关闭窗口
        $(document).ready(function () {
            $("#cancelBtn").click(function(){
                $("#modifyContent").css("display","none");
            })
//        点击修改，弹出窗口
            $('.modifyFeedBtn').click(function(){
                var feedId = $(this).attr('feedId');
                //alert(feedId);
                $.get('./feed_modify.php?id='+ feedId, function(result){
                    var feed = $.parseJSON(result);
                    $('#modifyContent input[name=id]').val(feed.id);
                    $('#modifyContent input[name=img_url]').val(feed.img_url);
                    $('#modifyContent input[name=message]').val(feed.message);
                    $('#modifyContent input[name=classHour]').val(feed.classHour);
                    $('#modifyContent').css("display","block");
                })
            })
        })
    </script>
<!--      当前时间-->
    <script type="text/javascript">
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            var y=today.getFullYear();
            var mm=today.getMonth()+1;
            mm =(mm<10 ? "0"+mm:mm);
            var d=today.getDate();
            d =(d<10 ? "0"+d:d);
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('txt').innerHTML=y+"-"+mm+"-"+d+" "+h+":"+m+":"+s;
            setTimeout('startTime()',500)
        }
        function checkTime(i)
        {
            if (i<10)
            {i="0" + i}
            return i
        }
    </script>
</head>
<body onload="startTime()">
<div class="container" style="margin-top:20px">
    <span>当前时间:</span>
    <div id="txt" style="display:inline-block"></div>
</div>
<div class="container">
    <table border='1' class='table table-striped'>
    <thead><tr>
    <th>id</th>
    <th>最后修改时间</th>
    <th>img_url</th>
    <th>message</th>
    <th>classHour</th>
    <th>操作</th>
    </tr></thead>
    <?php foreach($feed_list as $row):?>
        <tr class="<?php echo $row['id'] ;?>">
        <td><?php echo $row['id'];?></td>
        <td><input type="text" class="date" name="time" value="<?php echo $row['last_time'];?>"/></td>
        <td><?php echo $row['img_url'];?></td>
        <td><?php echo $row['message'];?></td>
        <td><?php echo $row['classHour'];?></td>
        <td><a class='btn btn-danger btn-sm'  href="javascript:del_confirm(<?php echo $row['id'];?>)">删除</a>
            <a class='btn btn-info btn-sm modifyFeedBtn'  feedID="<?php echo $row['id'] ;?>">修改</a></td>
        </tr>
    <?php endforeach;?>
    </table>
        <div id="modifyContent">
            <form class="form-inline">
                <h2>信息修改</h2>
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
                <input class="btn btn-default" type="button" id="modifyBtn" value="确认修改">
                <input class="btn btn-default" type="button" id="cancelBtn" value="取消">
            </form>
        </div>
<!--        ajax确认修改--><!--        ajax确认修改--><!--        ajax确认修改--><!--        ajax确认修改-->
        <script>
           $(document).ready(function(){
               $("#modifyBtn").click(function(){
                   var id = $('input[name=id]').val();
                   var img_url = $('input[name=img_url]').val();
                   var message = $('input[name=message]').val();
                   var classHour = $('input[name=classHour]').val();
                   $.ajax({
                       url : 'http://127.0.0.1/jikexueyuan/feed_modifyServer.php',
                       type : 'post',
                       data : {id:id,img_url:img_url,message:message,classHour:classHour},
                       dataType : 'json',
                       success : function(result){
                           if(result.state){
                               $("#modifyContent").hide();
//                               window.location.href="feed.php";
                               $("tr."+id).find("td").eq(2).html(img_url);
                               $("tr."+id).find("td").eq(3).html(message);
                               $("tr."+id).find("td").eq(4).html(classHour);
                               $("tr."+id).find("input").val(getTime());
                           }else{
                               alert(result.data);
                           }
                       }
                   })
               })
           })
           //        修改后显示当前时间
           function getTime(){
               var d = new Date();
               var t = d.getDate();
               t =(t<10 ? "0"+t:t);
               var m= d.getMonth()+1;
               m =(m<10 ? "0"+m:m);
               var y = d.getYear()+1900;
               var h = d.getHours();
               h =(h<10 ? "0"+h:h);
               var i = d.getMinutes();
               i =(i<10 ? "0"+i:i);
               var s = d.getSeconds();
               s =(s<10 ? "0"+s:s);
               return(y+"-"+m+"-"+ t+" "+h+":"+i+":"+s);
           }
        </script>
    </div>

</div>
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
                <span class="total"><?php echo "共（".$totalNumber."）条"."(".$totalPage.")"."页";?></span>
            </li>
            <?php
            }else {
                ?>
                <li>
                    <a href="feed.php?page=<?php echo $page + 1;?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </nav>

</div>


<div class="footer container">
    <form class="form-inline" action="./feed_server.php" method="POST">

        <div class="form-group">
            <label for="exampleInputName2">id</label>
            <input class="form-control" type="text" name="id">
        </div>

        <div class="form-group">
            <label for="exampleInputName2">img_url</label>
            <input class="form-control" type="text" name="img_url">
        </div>

        <div class="form-group">
            <label for="exampleInputName2">message</label>
            <input class="form-control" type="text" name="message">
        </div>

        <div class="form-group">
            <label for="exampleInputName2">classHour</label>
            <input type="text" class="form-control" name="classHour">
        </div>
        <input class="btn btn-default" type="submit" value="添加">
    </form>
</div>
</body>
</html>