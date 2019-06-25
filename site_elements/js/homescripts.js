$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip(); 
    $('#signinsubmit').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

            	username: {
                message: 'The username is not valid',
                container: '#unMessage',
                validators: {
                        notEmpty: {
                            message: 'Enter your username'
                        },
                        stringLength: {
                            min: 6,
                            max: 20,
                        },
                    }
                },
                password: {
                message: 'The username is not valid',
                container: '#passMessage',
                validators: {
                        notEmpty: {
                            message: 'Enter the password'
                        },
                        stringLength:{
                            min: 5,
                            max: 20,
                            message: 'Password must be more then 4 digits'
                        },
                    }
                },
	            
            }
        })

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



//  AJAX SEATCH
    
        $("#search_field").keyup(function(){
                    var getUrl = window.location;
                    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        if($("#search_field").val().length>3){
        $.ajax({
            type: "post",
            url: baseUrl+"/search/action",
            cache: false,               
            data:'search='+$("#search_field").val(),
            success: function(response){
                $('#finalResult').html("");
                var obj = JSON.parse(response);
                if(obj.length>0){
                    try{
                        var items=[];   
                        $.each(obj, function(i,val){                                    
                            items.push($('<a href="item/template/'+val.product_id+'"/>').text(val.title));
                        }); 
                        $('#finalResult').append.apply($('#finalResult'), items);
                        $("#searchresult").show("fast");

                    }catch(e) {     
                        alert('Exception while request..');
                    }       
                }else{
                    //$('#finalResult').html($('<li/>').text("No Match Found"));        
                }       
                
            }
        });
        }
        else{
            $("#searchresult").fadeOut();
        }
        
        return false;
      });
});


    $(function() {
                /**
                * the element
                */
                var $ui         = $('#ui_element');
                
                /**
                * on focus and on click display the dropdown, 
                * and change the arrow image
                */
                $(".sb_down").click(function(){
                    $ui.find('.sb_down')
                       .addClass('sb_up')
                       .removeClass('sb_down')
                       .andSelf()
                       .find('.sb_dropdown')
                       .show();
                });

                /**
                * on mouse leave hide the dropdown, 
                * and change the arrow image
                */
                $ui.find('.sb_input').bind('focus click',function(){
                    $ui.find('.sb_up')
                       .addClass('sb_down')
                       .removeClass('sb_up')
                       .andSelf()
                       .find('.sb_dropdown')
                       .hide();
                });

                $ui.bind('mouseleave',function(){
                    $ui.find('.sb_up')
                        .addClass('sb_down')
                       .removeClass('sb_up')
                       .andSelf()
                       .find('.sb_dropdown')
                       .hide();
                 });

                

            
                                
                /**
                * selecting all checkboxes
                */
                $ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
                    $(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
                });
            });
