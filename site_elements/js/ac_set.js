$(document).ready(function(){

    $("#btn_trigger").mouseenter(function(){
        $("#loginpanel").hide();
        $("#userpanel").hide();
        $("#side_nav").fadeIn();
    });
    $("#side_nav").mouseleave(function(){
        $("#side_nav").fadeOut();
    });

    $("#side_nav").mouseenter(function(){
        $("#side_nav").show();
    });
    $(".btn_t").click(function(){
        $("#side_nav").hide();
        $("#userpanel").hide();
        $("#loginpanel").fadeToggle();
    });
    $("#logeduser_c").mouseenter(function(){
        $("#side_nav").hide();
        $("#loginpanel").hide();
        $("#userpanel").show();
    });
    $("#logeduser_c").mouseleave(function(){
        $("#userpanel").hide();
    });
    $("#userpanel").mouseenter(function(){
        $("#userpanel").show();
    });
    $("#userpanel").mouseleave(function(){
        $("#userpanel").hide();
    });


});



