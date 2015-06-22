<?php
require_once "include_index.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>极客学院IT在线教育平台-中国最大的IT职业在线教育平台</title>
    <link rel="stylesheet" href="css/base.css" type="text/css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <script src="js/jquery-2.1.4.js"></script>
<!--    <script src="js/index.js"></script>-->
    <style type="text/css">
        #banner {position:relative; width:570px; height:295px;  overflow:hidden;float:left;margin-left: 10px;
            border-top: 2px solid #35b558;border-bottom: 2px solid #35b558;}
        #banner ul {position:absolute;list-style-type:none;filter: Alpha(Opacity=80);opacity:0.8;z-index:1002;
            margin:0; padding:0; bottom:10px; right:180px;}
        #banner ul li {display: inline-block;
            width: 34px;
            height: 2px;
            background: #fff;
            margin: 0 6px;
            cursor: pointer;}
        #banner ul li span{
            display:none;
        }
        #banner ul li.on { background:#35b558}
        #banner_list a{position:absolute;}
    </style>
    <script type="text/javascript">
        var t = n =0, count;
        $(document).ready(function(){
            count=$("#banner_list a").length;
            $("#banner_list a:not(:first-child)").hide();

            $("#banner li").click(function() {
                var i = $(this).text() -1;//获取Li元素内的值，即1，2，3，4
                n = i;
                if (i >= count) return;
                $("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
                document.getElementById("banner").style.background="";
                $(this).toggleClass("on");
                $(this).siblings().removeAttr("class");
            });
            t = setInterval("showAuto()", 4000);
            $("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
        })

        function showAuto()
        {
            n = n >=(count -1) ?0 : ++n;
            $("#banner li").eq(n).trigger('click');
        }
    </script>
</head>
    <body>
       <div class="header">
           <div class="headerbox">
               <div class="heading">
                   <div class="logo">
                       <img class="logo_img" src="images/logo_c8caff4.png"/>
                   </div>
                   <div class="bigbox">
                       <div class="placehold">
                           <a href="">Android</a>
                           <a href="">ios</a>
                           <a href="">HTML5</a>
                       </div>
                       <div class="searchbox">
                           <input class="searchtxt" type="text" placeholder="搜课程">
                       </div>
                       <div class="searchbtn">
                           <img src="http://s1.jikexueyuan.com/common/images/topsearch-icon_e1f5df2.png" />
                       </div>
                   </div>
                   <div class="loading">
                       <a href="">QQ登陆</a>
                       丨
                       <a href="">登陆</a>
                       丨
                       <a href="loading.html">注册</a>
                   </div>
               </div>
           </div>
           <div class="header_nav">
               <div class="headerbox1">
                   <div class="nav">
                       <ul class="nav_1">
                           <li><a href="">首页</a></li>
                           <li><a href="">职业课程库</a></li>
                           <li><a href="">知识体系图</a></li>
                           <li><a href="">实战路径图</a></li>
                           <li><a href="">技术问答</a></li>
                       </ul>
                   </div>
                   <div class="navbar">
                       <ul class="nav_2">
                           <li><img src="http://s1.jikexueyuan.com/common/images/vip-icon_76ae754.png"/></li>
                           <li><a href="">VIP会员</a></li>
                           <li>&nbsp</li>
                           <li>&nbsp</li>
                           <li><img src="http://s1.jikexueyuan.com/common/images/star-icon_c593bc1.png"/></li>
                           <li><a href="">求课程</a></li>
                           <li>&nbsp</li>
                           <li>&nbsp</li>
                           <li><img src="http://s1.jikexueyuan.com/common/images/dl-icon_4bc18a7.png"/></li>
                           <li><a href="">客户端</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <div class="container">
           <div class="content">
               <div class="content_nav">
                   <ul class="content_naver">
                       <li>
                           <div class="linav">
                               <span>移动应用开发</span>
                               <div class="span_content" style="width: 241px;">
                                   <a href="http://www.jikexueyuan.com/course/cocos2d-x/">Cocos2d-x</a>
                                   <a href="http://www.jikexueyuan.com/course/html5/">HTML5</a>
                                   <a href="http://www.jikexueyuan.com/course/unity3d/">Unity3D</a>
                                   <a href="http://www.jikexueyuan.com/course/swift/">Swift</a>
                                   <a href="http://www.jikexueyuan.com/course/ios/">iOS</a>
                                   <a href="http://www.jikexueyuan.com/course/android/">Android</a>
                                   <a href="http://www.jikexueyuan.com/course/egret/">Egret</a>
                                   <a href="http://www.jikexueyuan.com/course/createjs/">CreateJS</a>
                                   <a href="http://www.jikexueyuan.com/course/unreal/">Unreal4</a>
                               </div>
                           </div>
                       </li>
                       <li>
                           <div class="linav">
                               <span>后端开发</span>
                               <div class="span_content" style="width: 241px;">
                                   <a href="http://www.jikexueyuan.com/course/cocos2d-x/">php</a>
                                   <a href="http://www.jikexueyuan.com/course/html5/">ASP.NET</a>
                                   <a href="http://www.jikexueyuan.com/course/unity3d/">J2EE</a>
                                   <a href="http://www.jikexueyuan.com/course/unity3d/">Python</a>
                                   <a href="http://www.jikexueyuan.com/course/unity3d/">Go</a>
                                   <a href="http://www.jikexueyuan.com/course/unity3d/">Django</a>
                               </div>
                           </div>
                       </li>
                       <li>
                           <div class="linav">
                               <span>web前端开发</span>
                               <div class="linav">
                                   <div class="span_content" style="width: 241px;">
                                       <a href="http://www.jikexueyuan.com/course/cocos2d-x/">html</a>
                                       <a href="http://www.jikexueyuan.com/course/html5/">Jquery</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Jquery UI</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Bootstrap</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">css</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Javascript</a>
                                   </div>
                               </div>
                           </div>
                       </li>
                       <li>
                           <div class="linav">
                               <span>智能硬件&物联网</span>
                               <div class="linav">
                                   <div class="span_content" style="width: 241px;">
                                       <a href="http://www.jikexueyuan.com/course/cocos2d-x/">php</a>
                                       <a href="http://www.jikexueyuan.com/course/html5/">JSP</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">J2EE</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Python</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Apache</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Maven</a>
                                   </div>
                               </div>
                           </div>
                       </li>
                       <li>
                           <div class="linav">
                               <span>操作系统&数据库</span>
                               <div class="linav">
                                   <div class="span_content" style="width: 241px;">
                                       <a href="http://www.jikexueyuan.com/course/cocos2d-x/">Docker</a>
                                       <a href="http://www.jikexueyuan.com/course/html5/">Hadoop</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Storm</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Hive</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Hbase</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">OpenStack</a>
                                   </div>
                               </div>
                           </div>
                       </li>
                       <li>
                           <div class="linav">
                               <span>基础技术</span>
                               <div class="linav">
                                   <div class="span_content" style="width: 241px;">
                                       <a href="http://www.jikexueyuan.com/course/cocos2d-x/">C</a>
                                       <a href="http://www.jikexueyuan.com/course/html5/">C++/a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">C#</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Swift</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Java</a>
                                       <a href="http://www.jikexueyuan.com/course/unity3d/">Shell</a>
                                   </div>
                               </div>
                           </div>
                       </li>
                       <li><div class="linav"><span>图形图像设计</span></div></li>
                       <li><div class="linav"><span>认证考试</span></div></li>
                   </ul>
               </div>
               <!--<div class="content_img">-->
                   <!--<img src="images/5564389d40bf8 (1).jpg"/>-->
               <!--</div>-->
               <div id="banner">
                   <ul>
                       <li class="on"><span>1</span></li>
                       <li><span>2</span></li>
                       <li><span>3</span></li>
                       <li><span>4</span></li>
                   </ul>
                   <div id="banner_list">
                       <a href="#" target="_blank"><img src="images/556d640f6191d.jpg" title="极客学院" alt="极客学院"/></a>
                       <a href="#" target="_blank"><img src="images/5565afbe2a5b0.jpg" title="极客学院" alt="极客学院"/></a>
                       <a href="#" target="_blank"><img src="images/55703e4f6dbf9.jpg" title="极客学院" alt="极客学院"/></a>
                       <a href="#" target="_blank"><img src="images/5564389d40bf8 (1).jpg" title="极客学院" alt="极客学院"/></a>
                   </div>
               </div>
               <div class="content_txt">
                   <div class="content_top">
                       <h2>极客学院 让学习更有效</h2>
                       <p class="smaller">最新丨系统丨实战</p>
                       <input class="btn" type="button" value="了解极客学院"/>
                   </div>
                   <div class="content_bottom">
                       <h2>成为VIP 极客启程</h2>
                       <p class="smaller">√全部课程 √高清视频</p>
                       <p class="smaller">√问答服务 √课程资料</p>
                       <input class="btn_bottom" type="button" value="了解VIP权益"/>
                   </div>
               </div>
           </div>
           <div class="content_mid_head">
              <div class="content_mid_header">
                  <ul class="content_mid_headnav">
                      <li><a href="">热门推荐</a></li>
                      <li><a href="">最新课程</a></li>
                      <li><a href="">免费课程</a></li>
                      <li><a href="">项目实战</a></li>
                      <li><a href="">全球首发</a></li>
                      <li><a href="">企业合作</a></li>
                  </ul>
              </div>


               <div class="mid_content"></div>
               <div class="img_container">
                   <?php foreach($recommend_list as $one):?>
                       <div class="mid_img">
                           <div class="shadow">
                               <i class="player_icon" style="background: url(images/player_icon.png)0 0 no-repeat;background-size: 50px 50px"></i>
                           </div>
                               <img src="<?php echo $one['img_url'] ;?>"/>
                           <div class="mid_mid_box">
                               <div class="img_container_bottom">
                                   <p><?php echo $one['message'] ;?></p>
                                   <p class="mid_img_content">本课程带领大家实现微博类应用，首先简单的展示了下应用的功能，进行了微博应用的实现需求分析，其次讲解如何接入新浪微博的 SDK 及其使用方法。并进行项目环境的搭建，为后面的开发做好准备工作。</p>
                                   <i class="time_icon"></i>
                                   <em><?php echo $one['classHour'] ;?></em>
                                   <img class="small_img" src="<?php echo $one['small_icon'];?>" style="width:15px;height: 15px" />
                               </div>
                           </div>
                       </div>
                    <?php endforeach;?>


               </div>
               <div  class="bottom_content">
                   <div class="contenttool">
                       <a class="map" href="">实战路径图</a>
                       <p class="why">?</p>
                       <a class="more" href="">更多>></a>
                   </div>
               </div>
               <div class="imger">
                   <div class="imgbox">
                       <?php foreach($combat_list as $two):;?>
                       <div class="imger1">
                           <img src="<?php echo $two['img_url'];?>" width="70px" height="70px"/>
                           <h2><?php echo $two['title'];?></h2>
                           <p><?php echo $two['message'];?></p>
                           <p><?php echo $two['message2']; ?></p>
                           <p><?php echo $two['message3']; ?></p>
                           <button class="button" style="width:140px;height:33px;font-size: 14px">立即学习</button>
                       </div>
                       <?php endforeach;?>


                   </div>
                   <div  class="bottom_content1">
                       <div class="contenttool">
                           <a class="map" href="">知识体系图</a>
                           <p class="why">?</p>
                           <a class="more" href="">更多>></a>
                       </div>
                   </div>
                   <div class="content_foot">
                        <?php foreach($knowledge_list as $row):?>
                       <div class="foot_img"><img src="<?php echo $row['img_url'];?>"/>
                           <h2><?php echo $row['message'];?></h2>
                           <p><?php echo $row['classHour'];?></p>
                       </div>
                       <?php endforeach;?>

                   </div>
                   <div class="content_footing">
                       <a href="">Egret</a>
                       <a href="">Swift语言</a>
                       <a href="">Cocos2d-x游戏开发</a>
                       <a href="">计算机一级</a>
                       <a href="">计算机二级</a>
                       <a href="">WatchKit开发</a>
                       <a href="">GUI</a>
                       <a href="">Asp.Net</a>
                       <a href="">Web前端开发</a>
                       <a href="">Python</a>
                       <a href="">Docker</a>
                       <a href="">Arduino</a>
                       <a href="">Android UiAutomator</a>
                   </div>
                   <div class="now_loading">
                       <a class="all" href="">查看全部课程</a>
                       <span>现在加入，<a class="red" href="">可获赠3天VIP</a>，立即学习全部课程</span>
                   </div>
                   <div class="contenttooler">
                       <a class="cooperate" href="">战略合作企业</a>
                       <a href="" class="more">更多>></a>
                   </div>
                   <div class="cooperate_img">
                       <div><img src="http://wirrorcdn.jikexueyuan.com/picture/microsoft.jpg"/></div>
                       <div><img src="http://wirrorcdn.jikexueyuan.com/picture/microsoft.jpg"/></div>
                       <div><img src="http://wirrorcdn.jikexueyuan.com/picture/microsoft.jpg"/></div>
                       <div><img src="http://wirrorcdn.jikexueyuan.com/picture/microsoft.jpg"/></div>
                       <div><img src="http://wirrorcdn.jikexueyuan.com/picture/microsoft.jpg"/></div>
                       <div><img src="http://wirrorcdn.jikexueyuan.com/picture/microsoft.jpg"/></div>
                   </div>
                   <div class="contenttooler">
                       <a  class="cooperate" href="">合作院校</a>
                   </div>
                   <div class="cooperate_school">
                       <div><img src="http://a1.jikexueyuan.com/home/201406/19/2025/53a2ae172128b.jpg"/></div>
                       <div><img src="http://a1.jikexueyuan.com/home/201406/19/2025/53a2ae172128b.jpg"/></div>
                       <div><img src="http://a1.jikexueyuan.com/home/201406/19/2025/53a2ae172128b.jpg"/></div>
                       <div><img src="http://a1.jikexueyuan.com/home/201406/19/2025/53a2ae172128b.jpg"/></div>
                       <div><img src="http://a1.jikexueyuan.com/home/201406/19/2025/53a2ae172128b.jpg"/></div>
                       <div><img src="http://a1.jikexueyuan.com/home/201406/19/2025/53a2ae172128b.jpg"/></div>
                       <div><img src="http://a1.jikexueyuan.com/home/201406/19/2025/53a2ae172128b.jpg"/></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="footer">
           <div class="footting">
               <div class="footting_1">
                   <dl>
                       <dt><a href="">极客学院</a></dt>
                       <dd>·<a href="">职业课程库</a></dd>
                       <dd>·<a href="">知识体系图</a></dd>
                       <dd>·<a href="">实战途径图</a></dd>
                       <dd>·<a href="">企业课程</a></dd>
                       <dd>·<a href="">资源下载</a></dd>
                       <dd>·<a href="">课程标签</a></dd>
                   </dl>
                   <dl>
                       <dt><a href="">网站服务</a></dt>
                       <dd>·<a href="">课程需求</a></dd>
                       <dd>·<a href="">免费体验VIP</a></dd>
                       <dd>·<a href="">黑板报</a></dd>
                       <dd>·<a href="">网站地图</a></dd>
                   </dl>
                   <dl>
                       <dt><a href="">帮助中心</a></dt>
                       <dd>·<a href="">技术问答</a></dd>
                       <dd>·<a href="">VIP权益</a></dd>
                       <dd>·<a href="">常见问题</a></dd>
                       <dd>·<a href="">服务条款</a></dd>
                       <dd>·<a href="">版权声明</a></dd>
                       <dd>·<a href="">免责声明</a></dd>
                   </dl>
                   <dl>
                       <dt><a href="">合作交流</a></dt>
                       <dd>·<a href="">关于我们</a></dd>
                       <dd>·<a href="">联系我们</a></dd>
                       <dd>·<a href="">社会招聘</a></dd>
                       <dd>·<a href="">布道师招募</a></dd>
                       <dd>·<a href="">合作咨询</a></dd>
                       <dd>·<a href="">友情链接</a></dd>
                   </dl>
                   <div class="footer_right">
                       <div class="foot_top">
                           <img src="http://s1.jikexueyuan.com/common/images/iphone_ecb3977.png" />
                           <p >手机客户端</p>
                           <a href="">离线缓存 随时学习 </a>>
                       </div>
                       <div class="foot_mid">
                           <a  class="weibo" href=""></a>
                           <a  class="tieba" href=""></a>
                           <a  class="weixin" href=""></a>
                       </div>
                       <div class="foot_bottom">
                            <div class="kefu_online">
                            </div>
                            <div class="kefu_time">
                                <h5>联系我们</h5>
                                <p>工作日9:00-21:00在线</p>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="foot_content">
               Copyright © 2013-2015
               <a href="">极客学院 jikexueyuan.com</a>
               All Rights Reversed.京ICP备11018032号-8 京公网安备11010802013056
           </div>
        </div>

    </body>
</html>