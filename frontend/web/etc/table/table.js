$(function(){

    var posIndex = 0;

    var setSelected = function(){
        var trs = $(".drag-table").children("tbody").find("tr");
        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).css("background-color", "lightgreen");
                }   
            });
        });
    };

    var removeSeleted = function(){

        var trs = $(".drag-table").children("tbody").find("tr");
        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).css("background-color", "white");
                }   
            });
        });

    };

    var cleanColSeleted = function(){

        var trs = $(".drag-table").children("tbody").find("tr");

        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).empty();
                }   
            });
        });

    };

    var deleteColSeleted = function(){

        var trs = $(".drag-table").children("tbody").find("tr");

        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).remove();
                }   
            });
        });

    };

    var deleteRowSeleted = function(){

        $(":checkbox[name='rowSelect']").each(function(){
            if( $(this).is(":checked") ){
                $(this).parent("td").parent("tr").remove();
            }
        });
    };

    var rotateCol = function(aCol, bCol){

        var trs = $("tr:gt(0)");
        var a,b;
        $.each(trs, function(i, v){
            a = $(this).children("td").eq(aCol).text();
            b = $(this).children("td").eq(bCol).text();
            $(this).children("td").eq(aCol).text(b);
            $(this).children("td").eq(bCol).text(a);
        });

    }

    $("#footer").on("click", ":button[name='DH']",function(){
        var a = $(this).siblings(":text[name='ACol']").val();
        var b = $(this).siblings(":text[name='BCol']").val();
        if(!a){
            alert("倒换失败,A列不能为空/0");
            return false;
        }

        if(!b){
            alert("倒换失败,B列不能为空/0");
            return false;
        }

        rotateCol(a, b);

    });


    $(".drag-table").on("click", "th",function(){

        removeSeleted();
        posIndex = $(this).index();
        setSelected();
    });

    $("#footer").on("click", ":button[name='cleanColSelected']",function(){
        cleanColSeleted();
    });

    $("#footer").on("click", ":button[name='delColSelected']",function(){
        deleteColSeleted();
        posIndex = 0;
    });

    $("#footer").on("click", ":button[name='delRowSelected']",function(){
        deleteRowSeleted();
    });

    $("#footer").on("change", ":checkbox[name='rowSelect']", function(){

        $(this).parent("td").siblings("td").css("background-color", "lightyellow");
       
        if( !$(this).is(":checked") ){

            $(this).parent("td").siblings("td").css("background-color", "white");
        }
        
    });

    var setYearCols = function(){

        var year = $("#footer").find("#yy").val();
        if(!year){
            return false;
        }
         var trs = $(".drag-table").children("tbody").find("tr");
        $.each(trs, function(i, v){         
            $(this).find("td").eq(1).text(year);
        });
    };

    $("#footer").on("click", ":button[name='setYear']",function(){
        setYearCols();
    });



    //******************************************//
    //******************************************//
    //******************************************//
    //******************************************//
    //******************************************//

$("input[name='file']:file").change(function(){
    $("#import").find("form").submit();
});

$(":button[name='import']").click(function(){

    var dia = confirm("确定导入?");

    if(dia){

        var ths = new Array();
        $(".drag-table").children("thead").children("tr:first").find("th").each(function(i, v){
                    ths[i] = $(this).attr("data-tpl");
        });
        //console.log(ths);
       var tr_data = $(".drag-table").children("tbody").children("tr");

       tr_data.each(function(){

            var tr_obj = $(this);
            var data_obj = new Object();

            $(this).find("td").each(function(i, v){
                if(typeof(ths[i]) != "undefined"){
                    data_obj[ths[i]] = $(this).text();
                }
            });

            $.post(
                "index.php?r=input/edit/import-add&action=" + $("#action").val(),
                {"data": data_obj},
                function(data){
                   //console.log(data); 
                    if(data == "defail"){
                        tr_obj.css("background-color", "red");
                    }
                    if(data == "success"){
                        tr_obj.remove();
                    }
                }


            );

            data_tr = null;

       });
        
    }

});




});