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

   
//  AJAX SEATCH
    
        $("#search").keyup(function(){
          var getUrl = window.location;
          var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        if($("#search").val().length>3){
        $.ajax({
            type: "post",
            url: baseUrl+"/search/action",
            cache: false,               
            data:'search='+$("#search").val(),
            success: function(response){
                $('#finalResult').html("");
                var obj = JSON.parse(response);
                if(obj.length>0){
                    try{
                        var items=[];   
                        $.each(obj, function(i,val){                                    
                            items.push($('<a href="'+baseUrl+'/item/template/'+val.product_id+'"/>').text(val.title));
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

//Like 


function toggleLike(e) 
  {
    var thisrecord = $(this).closest( "div" );

    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    var user_id = parseInt( thisrecord.find( "span#user_id" ).html() );
    var string_user_id = thisrecord.find("span#user_id").html();
    var product_id = parseInt( thisrecord.find( "span#product_id" ).html() );
    var like_unlike = thisrecord.find( "#btnfavorite" ).html();
    var sln = like_unlike.length;
    var user_sln = string_user_id.length;
    if(user_sln == "0")
    {
      e.preventDefault();
      $.Zebra_Dialog('Please login first with your <strong>ThemesHaven</strong> account.', {
        'type':     'information',
        'title':    'Information',
        'buttons':  [
                        {caption: 'Ok', callback: function() {document.location.href = 'http://localhost/ThemesHaven/signin'}},
                        {caption: 'Cancel', callback: function() { }}
                    ]
        });
      return;
    }

      if(sln == "16") 
        {
          $( this ).replaceWith('<span class="btnfavorite" id="btnfavorite">Remove Favorite</span>');
          var likes = parseInt( thisrecord.find( "span#number_of_likes" ).html() ) + 1;
          thisrecord.find( "span#number_of_likes" ).html( likes );
          document.getElementById("Xnumber_of_likes").innerHTML = likes;

          $( '#like_button span' ).click(toggleLike); // **frakenstein teh .click() event
          $.post(baseUrl+"/Like_unlike/like/" + user_id + "/" + product_id );
        }
      else if(sln == "15")
       {
            $( this ).replaceWith( '<span class="btnfavorite" id="btnfavorite">Add to Favorites</span>');
            var likes = parseInt( thisrecord.find( "span#number_of_likes" ).html() ) - 1;
            thisrecord.find( "span#number_of_likes" ).html( likes );
            document.getElementById("Xnumber_of_likes").innerHTML = likes;
            $( '#like_button span' ).click(toggleLike); // **frakenstein teh .click() event
            $.post(baseUrl+"/Like_unlike/unlike/"+user_id+"/"+product_id);
       }
        

        e.preventDefault();
    }

    $( '#like_button span' ).click(toggleLike);



});