
function user_edit(){

    $('#user_edit div.alert-success').remove(); 
    $('#user_edit div.alert-warning').remove(); 
    $find = $('#username,#pass1,#pass2,#lname,#fname,#email,#mobile').parent();
    $find.removeClass('has-error'); 
    $('#user_edit span.help-block').remove(); 
    $('#user_edit input').attr('disabled','true');

    $('#loading').show().css('display','inline-block');

    var formData = {
        'form'               : 'user_edit',
        'username'           : $('#username').val(),
        'pass1'              : $('#pass1').val(),
        'pass2'              : $('#pass2').val(),
        'mobile'             : $('#mobile').val(),      
        'fname'              : $('#fname').val(),
        'lname'              : $('#lname').val(),
        'email'              : $('#email').val(),      
        'phone'              : $('#phone').val(),      
        'status'             : $('input[name="status"]:checked').val(),      
        'csrf'               : $('#csrf').val()
    };

    
    $.post('ajax/user_edit.php',formData,function(data){

    })
    .done(function(data){

        $('#user_edit input').removeAttr('disabled');
        $('#loading').hide();

        if ( !data.success) {

            if (data.errors.username) {
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.username + '</span>'); 
            }
            if (data.errors.pass1) {
                $find = $('input[name="pass1"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.pass1 + '</span>'); 
            }
            if (data.errors.pass2) {
                $find = $('input[name="pass2"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.pass2 + '</span>'); 
            }

            if (data.errors.fname) {
                $find = $('input[name="fname"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.fname + '</span>'); 
            }
            if (data.errors.lname) {
                $find = $('input[name="lname"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.lname + '</span>'); 
            }
            if (data.errors.nomatch) {
                toastr['error'](data.errors.nomatch);
                $find = $('input[name="pass2"],input[name="pass1"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.nomatch+ '</span>'); 
            }

            if (data.errors.exist) {
                toastr['error'](data.errors.exist);
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.exist+ '</span>'); 
            }
            if (data.errors.email) {
                toastr['error'](data.errors.email);
                $find = $('input[name="email"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.email + '</span>'); 
            }
             if (data.errors.mobile) {
                toastr['error'](data.errors.mobile);
                $find = $('input[name="mobile"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.mobile + '</span>'); 
            }

        }
        else {

            toastr['success'](data.message);
            window.location.replace("user_list");
        } 
        })

    .fail(function() {

        $('#user_edit div.alert-warning').remove(); 
        $('form[id="user_edit"').append('<div class="alert alert-warning">' + 'مشکلی در برقراری ارتباط پیش آمده است , بعدا امتحان کنید' + '</div>');

    })

}


function username_check_user_create(){

        
    $('#user_create #username').attr('disabled','true');
    $('#loading_username').show().css('display','inline-block');
    $find = $('#username').parent();
    $find.removeClass('has-error');
    $('#username-div span.help-block').remove(); 

    var data = {
            'element'            : 'username',
            'username'           : $('#username').val() 
        };

    $.post('ajax/username_check_user_create.php',data,function(data){

    })

    .done(function(data){
        $('#user_create #username').removeAttr('disabled');
        $('#loading_username').hide();
        $find = $('#username').parent();
        $find.removeClass('has-error');

        if ( !data.success) 
        {
            if(data.errors.exist){
                toastr['error'](data.errors.exist);
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
            }
            if(data.errors.username){
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.username + '</span>'); 
            }


        }
        else{
            if (data.message) {
                toastr['success'](data.message);
            }
        }
    })
}

function username_check_user_edit(){

        
    $('#user_edit #username').attr('disabled','true');
    $('#loading_username').show().css('display','inline-block');
    $find = $('#username').parent();
    $find.removeClass('has-error');
    $('#username-div span.help-block').remove(); 

    var data = {
            'element'            : 'username',
            'username'           : $('#username').val() 
        };

    $.post('ajax/username_check_user_edit.php',data,function(data){

    })

    .done(function(data){
        $('#user_edit #username').removeAttr('disabled');
        $('#loading_username').hide();
        $find = $('#username').parent();
        $find.removeClass('has-error');

        if ( !data.success) 
        {
            if(data.errors.exist){
                toastr['error'](data.errors.exist);
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
            }
            if(data.errors.username){
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.username + '</span>'); 
            }
        }
        else{
            if (data.message) {
                toastr['success'](data.message);
            }
        }
    })
}


function user_create(){

    $('#user_create div.alert-success').remove(); 
    $('#user_create div.alert-warning').remove(); 
    $find = $('#username,#pass1,#pass2,#lname,#fname,#email,#mobile').parent();
    $find.removeClass('has-error'); 
    $('#user_create span.help-block').remove(); 
    $('#user_create input').attr('disabled','true');

    $('#loading').show().css('display','inline-block');

    var formData = {
        'form'               : 'user_create',
        'username'           : $('#username').val(),
        'pass1'              : $('#pass1').val(),
        'pass2'              : $('#pass2').val(),
        'fname'              : $('#fname').val(),
        'lname'              : $('#lname').val(),
        'mobile'             : $('#mobile').val(),      
        'phone'              : $('#phone').val(),      
        'email'              : $('#email').val(),      
        'status'             : $('input[name="status"]:checked').val(),      
        'csrf'               : $('#csrf').val()
    };

    
    $.post('ajax/user_create.php',formData,function(data){

    })
    .done(function(data){

        $('#user_create input').removeAttr('disabled');
        $('#loading').hide();

        if ( !data.success) {


            if (data.errors.username) {
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.username + '</span>'); 
            }
            if (data.errors.pass1) {
                $find = $('input[name="pass1"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.pass1 + '</span>'); 
            }
            if (data.errors.pass2) {
                $find = $('input[name="pass2"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.pass2 + '</span>'); 
            }
            if (data.errors.fname) {   
                $find = $('input[name="fname"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.fname + '</span>'); 
            }
            if (data.errors.lname) {
                $find = $('input[name="lname"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.lname + '</span>'); 
            }
            if (data.errors.nomatch) {
                toastr['error'](data.errors.nomatch);
                $find = $('input[name="pass2"],input[name="pass1"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.nomatch+ '</span>'); 
            }
            if (data.errors.email) {
                toastr['error'](data.errors.email);                
                $find = $('input[name="email"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.email + '</span>'); 
            }
             if (data.errors.mobile) {
                toastr['error'](data.errors.mobile);
                $find = $('input[name="mobile"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.mobile + '</span>'); 
            }
            if (data.errors.exist) {
                toastr['error'](data.errors.exist);
                $find = $('input[name="username"]').parent();
                $find.addClass('has-error'); 
                $find.append('<span class="help-block help-block-error">' + data.errors.exist+ '</span>'); 
            }

            
        }
        else {

            $('#user_create div.alert-success').remove(); 
            window.location.replace("user_list");
        } 
        })

    .fail(function() {

        $('#user_create div.alert-warning').remove(); 
        $('form[id="user_create"').append('<div class="alert alert-warning">' + 'مشکلی در برقراری ارتباط پیش آمده است , بعدا امتحان کنید' + '</div>');

    })

}

