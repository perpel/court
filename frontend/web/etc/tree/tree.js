$(function(){

    $("#tree").children("li").find("span").click(function(){
        if($(this).hasClass("end")){
            return false;
        }
        $(this).next("a").next("ul").toggleClass("open");
        if($(this).next("a").next("ul").hasClass("open")){
            $(this).css("background-image", "url(images/del.png)");
        }else{
            $(this).css("background-image", "url(images/add.png)");
        }
        autoWidth();
    });

    var autoWidth = function(){
    var win = $(window).width();
    var winHeight = $(window).height();
    var sectionWidth = win - $(".side").width();
   $(".section").width(sectionWidth-1);
   $(".section").height(winHeight - 200);
   var login_msg_width = $(".login-msg").width();
    var breadcrumbs_width = $(".breadcrumbs").width();
    var deputy_width = $(".deputy").width();
    $("#notice").width( deputy_width - login_msg_width - breadcrumbs_width - 120);
    };

});