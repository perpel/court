$(function(){

    $(window).on("resize load", function(){
        var win = $(window).width();
        var winHeight = $(window).height();
        var sectionWidth = win - $(".side").width();
       $(".section").width(sectionWidth-1);
       $(".section").height(winHeight - 200);
       var login_msg_width = $(".login-msg").width();
        var breadcrumbs_width = $(".breadcrumbs").width();
        var deputy_width = $(".deputy").width();
        $("#notice").width( deputy_width - login_msg_width - breadcrumbs_width - 120);
    });

    
    

});