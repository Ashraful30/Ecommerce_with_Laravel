$(document).ready(function(){

    $('#new_password').on('click',function(){
       var check_current_password = $('#current_password').val();
        // console.log("Working inside");
        $.ajax({

			url: '/admin/check',
			method: 'get',
			data: {check_current_password:check_current_password},
			success: function(data){
				
                //alert(data);
                if(data=='true'){
                    $('#check_message').html('<i class="text-success fa fa-check-circle" aria-hidden="true"></i>');
                } else{
                    $('#check_message').html('<i class="text-danger fa fa-times-circle" aria-hidden="true"></i><span class="text-danger"> Current password is not correct</span>');
                }
			}
		})
    });

    $('#new_password').keyup(function(){
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();

        if(confirm_password != ''){

            if(confirm_password != new_password){
                $('#confirm_message').html('<i class="text-danger fa fa-times-circle" aria-hidden="true"></i><span class="text-danger"> Confirm password is not correct</span>');
                $('#new_message').html('');
                $("#update_password").addClass("disabled");
            } else{
                $('#confirm_message').html('<i class="text-success fa fa-check-circle" aria-hidden="true"></i>');
                $('#new_message').html('<i class="text-success fa fa-check-circle" aria-hidden="true"></i>');
                $("#update_password").removeClass("disabled");
            }
        }
        // console.log('new_password :'+new_password);
        // console.log('confirm_password :'+confirm_password);
      });

    $('#confirm_password').keyup(function(){
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();

        if(confirm_password != new_password){
            $('#confirm_message').html('<i class="text-danger fa fa-times-circle" aria-hidden="true"></i><span class="text-danger"> Confirm password is not correct</span>');
            $("#update_password").addClass("disabled");
        } else{
            $('#confirm_message').html('<i class="text-success fa fa-check-circle" aria-hidden="true"></i>');
            $('#new_message').html('<i class="text-success fa fa-check-circle" aria-hidden="true"></i>');
            $("#update_password").removeClass("disabled");
        }
        // console.log('new_password :'+new_password);
        // console.log('confirm_password :'+confirm_password);
      });

    
});