/**
 * Created by siggi on 04.01.17.
 */

$(document).ready(function () {
    $("#hide").click(function () {
        $(".short").hide();
    });
    $("#show").click(function () {
        $(".short").show();
    });
});

$(document).ready(function(){

    $("#small").click(function(event){
        event.preventDefault();
        $("li").animate({"font-size":"24px"});
        $("span").animate({"font-size":"16px"});
        $("p").animate({"font-size":"12px", "line-height":"16px"});

    });

    $("#medium").click(function(event){
        event.preventDefault();
        $("li").animate({"font-size":"36px"});
        $("span").animate({"font-size":"24px"});
        $("p").animate({"font-size":"14px", "line-height":"20px"});

    });

    $("#large").click(function(event){
        event.preventDefault();
        $("li").animate({"font-size":"48px"});
        $("span").animate({"font-size":"30px"});
        $("p").animate({"font-size":"16px", "line-height":"20px"});

    });

    $( "a" ).click(function() {
        $("a").removeClass("selected");
        $(this).addClass("selected");

    });

});
