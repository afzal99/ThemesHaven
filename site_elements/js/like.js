$(document).ready(function(){
  function toggleLike(e) 
  {
    var thisrecord = $(this).closest( "div" );

    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    var user_id = parseInt( thisrecord.find( "span#user_id" ).html() );
    var string_user_id = thisrecord.find("span#user_id").html();
    var product_id = parseInt( thisrecord.find( "span#product_id" ).html() );
    var like_unlike = thisrecord.find( "#like_unlike" ).html();
    var sln = like_unlike.length;
    var user_sln = string_user_id.length;

    if(user_sln == "0")
    {
      e.preventDefault();
      return;
    }

	    if(sln == "47") 
        {
            $( this ).replaceWith( '<a href="#"><span id="like_unlike" class="link"><span class="glyphicon glyphicon-heart-empty"></span></span></a>');
            var likes = parseInt( thisrecord.find( "span#number_of_likes" ).html() ) - 1;
            thisrecord.find( "span#number_of_likes" ).html( likes );
            $( '#like_button a' ).click(toggleLike); // **frakenstein teh .click() event
  	        $.post(baseUrl+"/Like_unlike/unlike/" + user_id + "/" + product_id );
        }
  		else if(sln == "53")
       {
            $( this ).replaceWith( '<a href="#"><span id="like_unlike" class="link"><span class="glyphicon glyphicon-heart"></span></span></a>');
  	        var likes = parseInt( thisrecord.find( "span#number_of_likes" ).html() ) + 1;
            thisrecord.find( "span#number_of_likes" ).html( likes );
            $( '#like_button a' ).click(toggleLike); // **frakenstein teh .click() event
            $.post(baseUrl+"/Like_unlike/like/"+user_id+"/"+product_id);
       }
        

        e.preventDefault();
    }

    $( '#like_button a' ).click(toggleLike);




	});

 