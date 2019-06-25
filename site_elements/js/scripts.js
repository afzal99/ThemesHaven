function signup(){
	var username=document.forms["signupForm"]["username"].value;
	var email=document.forms["signupForm"]["email"].value;
	var firstName=document.forms["signupForm"]["firstName"].value;
	var lastName=document.forms["signupForm"]["lastName"].value;
	var gender=document.forms["signupForm"]["gender"].value;
	var country=document.forms["signupForm"]["country"].value;
	var state=document.forms["signupForm"]["state"].value;
	var zip=document.forms["signupForm"]["zip"].value;
	var paymentmethod=document.forms["signupForm"]["paymentmethod"].value;
	var paynumber=document.forms["signupForm"]["paynumber"].value;
	var cardnum=document.forms["signupForm"]["cardnum"].value;
	var cardemail=document.forms["signupForm"]["cardemail"].value;
	var cvc=document.forms["signupForm"]["cvc"].value;

	var confirminfo = document.getElementById("confirminfo");
	    confirminfo.innerHTML =
	    "<b>User Name:</b> "+username+
	    "</br><b>Email:</b> "+email+
	    "</br><b>First Name:</b> "+firstName+
	    "</br><b>Last Name:</b> "+lastName+
	    "</br><b>Gender:</b> "+gender+
	    "</br><b>Country :</b> "+country+
	    "</br><b>State:</b> "+state+
	    "</br><b>Zip Code:</b> "+zip+
	    "</br><b>Payment Method:</b> "+paymentmethod+
	    "</br><b>Mobile No:</b> "+paynumber+
	    "</br><b>Card Number:</b> "+cardnum+
	    "</br><b>Card Holder Name:</b> "+cardemail+
	    "</br><b>CVC:</b> "+cvc ;

}
function signupvalidation(){
	var username=document.forms["signupForm"]["username"].value;
	var email=document.forms["signupForm"]["email"].value;
	var firstName=document.forms["signupForm"]["firstName"].value;
	var lastName=document.forms["signupForm"]["lastName"].value;
	var gender=document.forms["signupForm"]["gender"].value;
	var country=document.forms["signupForm"]["country"].value;
	var state=document.forms["signupForm"]["state"].value;
	var zip=document.forms["signupForm"]["zip"].value;
	var paymentmethod=document.forms["signupForm"]["paymentmethod"].value;
	var paynumber=document.forms["signupForm"]["paynumber"].value;
	var cardnum=document.forms["signupForm"]["cardnum"].value;
	var cardemail=document.forms["signupForm"]["cardemail"].value;
	var cvc=document.forms["signupForm"]["cvc"].value;
	
	if(username=="" || email=="" || firstName=="" || firstName=="" || lastName=="" || country=="" || state=="" 
		|| zip=="")
	{
		var x = document.getElementById("conwr");
		x.innerHTML = "Fillup The Form Properly !";
		return false;
	}
	



}

function firststep(){
	var x = document.getElementById("step2");
	    x.style.background = "";
	var y = document.getElementById("step3");
	    y.style.background = "";
	var z = document.getElementById("step4");
	    z.style.background = "";

	var sname = document.getElementById("stepname");
			sname.innerHTML = "Account";

	var stepn = document.getElementById("step_n");
		stepn.innerHTML = "Steps 1-4";

}
function secondstep(){
		var x = document.getElementById("step2");
		    x.style.background = "#f0ad4e";
		var y = document.getElementById("step3");
		    y.style.background = "";
		var z = document.getElementById("step4");
		    z.style.background = "";


		var sname = document.getElementById("stepname");
			sname.innerHTML = "Personal";
		
		var stepn = document.getElementById("step_n");
			stepn.innerHTML = "Steps 2-4";
}
function thirdstep(){
		var x = document.getElementById("step2");
		    x.style.background = "#f0ad4e";
		var y = document.getElementById("step3");
		    y.style.background = "#5bc0de";
		var z = document.getElementById("step4");
		    z.style.background = "";	

		var sname = document.getElementById("stepname");
			sname.innerHTML = "Payment";

		var stepn = document.getElementById("step_n");
			stepn.innerHTML = "Steps 3-4";
}
function fourthstep(){
		var x = document.getElementById("step2");
		    x.style.background = "#f0ad4e";
		var y = document.getElementById("step3");
		    y.style.background = "#5bc0de";
		var z = document.getElementById("step4");
		    z.style.background = "#309730";	

		var sname = document.getElementById("stepname");
			sname.innerHTML = "Confirm";

		var stepn = document.getElementById("step_n");
			stepn.innerHTML = "Steps 4-4";
}






$(document).ready(function(){
    $("#first_step").fadeIn("slow");
	$("#second_step").hide();
	$("#third_step").hide();
	$("#fourth_step").hide();
	$("#cardinfo").hide();

    $(".btn1").click(function(){
	    $("#first_step").hide();
	    $("#second_step").fadeIn("slow");
	});
	$(".btn2").click(function(){
	    $("#first_step").hide();
	    $("#second_step").hide();
	    $("#third_step").fadeIn("slow");
	});
	$(".btn3").click(function(){
	    $("#first_step").hide();
	    $("#second_step").hide();
	    $("#third_step").hide();
	    $("#fourth_step").fadeIn("slow");
	});

	$(".btnp1").click(function(){
	    $("#first_step").fadeIn("slow");
	    $("#second_step").hide();
	    $("#third_step").hide();
	});
	
	$(".btnp2").click(function(){
	    $("#first_step").hide();
	    $("#second_step").fadeIn("slow");
	    $("#third_step").hide();
	});
	$(".btnp3").click(function(){
	    $("#first_step").hide();
	    $("#second_step").hide();
	    $("#third_step").fadeIn("slow");
	    $("#fourth_step").hide();
	});
	

	//for ajax on username
	$("#uload").hide();
	$('#message').hide();
	$('#username').blur(function(){
	var username_val = $("#username").val();
	 var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_.-]+[a-zA-Z0-9]$/;
	 
	 if(filter.test(username_val)){
	 $('#message').hide();
	 $('#uload').show();
	 $.post("signup/username_check", {
	 username: username_val
	 }, function(response){
	 $('#uload').hide();
	 $('#unmessage').html('').html(response.unmessage).show().delay(3000).fadeOut("slow");
	 });
	 return false;
	 }
	 });

	//for ajax on email
	$("#load").hide();
	$('#email').blur(function(){
	var email_val = $("#email").val();
	var username_val = $("#username").val();
	 var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
	 if(filter.test(email_val)){
	 $('#message').hide();
	 $('#load').show();

	 $.post("signup/email_check", {
	 email: email_val,
	 username: username_val
	 }, function(response){
	 $('#load').hide();
	 $('#message').html('').html(response.message).show().delay(4000).fadeOut("slow");
	 });
	 return false;
	 }
	 });

});




$(document).ready(function() {
	function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 20), '+', randomNumber(1, 20), '='].join(' '));

    $('#signupForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
	            	firstName: {
	                validators: {
	                    notEmpty: {
	                        message: 'The first name is required and cannot be empty'
	                    }
	                }
	            },
	            lastName: {
	                validators: {
	                    notEmpty: {
	                        message: 'The last name is required and cannot be empty'
	                    }
	                }
	            },
	            zip: {
	                validators: {
	                    notEmpty: {
	                        message: 'The zip code is required and cannot be empty'
	                    }
	                }
	            },
	            country: {
	                validators: {
	                    notEmpty: {
	                        message: 'The Country is required and cannot be empty'
	                    }
	                }
	            },
	            state: {
	                validators: {
	                    notEmpty: {
	                        message: 'The State is required and cannot be empty'
	                    }
	                }
	            },
				username: {
            	message: 'The username is not valid',
                container: '#usernameMessage',
                validators: {
                        notEmpty: {
                            message: 'The username is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 20,
                            message: 'The username must be more than 6 and less than 20 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'The username can only consist of alphabetical, number, dot and underscore'
                        },
                        different: {
                            field: 'password1',
                            message: 'The username and password cannot be the same as each other'
                        }
                    }
            	},
            	email: {
            	message: 'The email is not valid',
                container: '#emailmsg',
                validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        }
                    }
            	},
            	vcode: {
            	message: 'The verification code is not valid',
                container: '#vcmsg',
                validators: {
                        notEmpty: {
                            message: 'The verification code is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'The verification code can only consist of number'
                        }
                    }
            	},
            	password:{
            		validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
	                    identical: {
	                        field: 'confirmPassword',
	                        message: 'The password and its confirm are not the same'
	                    },
                        stringLength: {
                            min: 5,
                            max: 20,
                            message: 'The username must be more than 5 and less than 20 characters long'
                        },
                        different: {
                            field: 'username',
                            message: 'The password cannot be the same as username'
                        }
                    }


            	},
            	confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }

            	






            	}
        })
});


$(document).ready(function() {
	
    $('#verificationForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

            	vcode: {
            		container: '#error',
	                validators: {
	                    notEmpty: {
	                        message: 'The verification code is required'
	                    }
	                }
	            }
	            
            }
        })
});

$(document).ready(function() {
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
