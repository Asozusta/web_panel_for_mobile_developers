

function login_form(){

    $('#login div.alert-success').remove(); 
    $('#login div.alert-warning').remove(); 
    $('.has-error').removeClass('has-error'); 
    $('.help-block').remove(); 
    $('#login input').attr('disabled','true');

    $('#loading').show().css('display','inline-block');

    var formData = {
        'form'               : 1,
        'username'           : $('input[name="username"]').val(),
        'password'           : $('input[name="password"]').val(),
    };

    
    $.post('ajax/signinup.php',formData,function(data){

    })
    .done(function(data){

        $('#login input').removeAttr('disabled');
        $('#loading').hide();

        if ( !data.success) {

    

            if (data.errors.username) {
                
                                toastr['error'](data.errors.username);
           
            }
             if (data.errors.password) {
                
                                toastr['error'](data.errors.password);

            }

             if (data.errors.message_ajax) {
                
                                toastr['error'](data.errors.message_ajax);

            }
            

        }
        else {
                            toastr['success'](data.message);
                            window.location.replace("dashboard");
        }

    })

    .fail(function() {

        $('#login div.alert-warning').remove(); 
        $('#login').append('<div class="alert alert-warning">' + 'مشکلی در برقراری ارتباط پیش آمده است , بعدا امتحان کنید' + '</div>');

    })

}
