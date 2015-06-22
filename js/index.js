/**
 * Created by Admin on 2015/6/2.
 */



//$(document).ready(function(){
//    $(".linav").hover(function(){
//        $(".span_content").css({"display":"block"})
//    },function(){
//        $(".span_content").css("display","none");
//    })
//});

$(document).ready(function(){
    $(".mid_img").hover(function() {
        $(this).find(".shadow").fadeIn(200);
    },function(){
        $(this).find(".shadow").fadeOut(200);
    })
})
