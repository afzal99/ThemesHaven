$(document).ready(function() {
    $('#accountsettings').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	username: {
            		container: '#error',
	                validators: {
                        notEmpty: {
                            message: 'The username is required'
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
                    container: '#emailerror',
                    validators: {
                        notEmpty: {
                            message: 'The Email is required'
                        }
                    }
                },
                existingpass: {
                    container: '#passerror',
                    validators: {
                        notEmpty: {
                            message: 'The Password is required'
                        }
                    }
                },
                
                newpass:{
                    validators: {
                        identical: {
                            field: 'confirmpass',
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
                confirmpass: {
                validators: {
                    identical: {
                        field: 'newpass',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },

	            
            }
        })
});
