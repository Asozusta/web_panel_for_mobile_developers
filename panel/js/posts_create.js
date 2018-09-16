function create_post(){
    $('#createpostbutton').attr('disabled','true');
    var formData = {
        'form'                  : 'create_post',
        'title'                 : $('#title').val(),
        'text'                  : $('#text').val(),
        'senddate'              : $('#senddate').val()
    };
    $.post('ajax/posts_create.php',formData,function(data){
    })
    .done(function(data){

        $('#createpostbutton').removeAttr('disabled');

        if ( !data.success) {
            toastr['error'](data.errors);
        }
        else {
            toastr['success']('محتوا با موفقیت ایجاد شد , نسبت به پیوست فایل اقدام کنید');
            $("#textbox").fadeOut(1000);
            $("#attachbox").fadeIn(1000);
        }
    })
    .fail(function() {
            toastr['error']('مشکلی پیش آمده است . دوباره امتحان کنید');
    })
}


function edit_post(){
    $('#createpostbutton').attr('disabled','true');
    var formData = {
        'form'                  : 'edit_post',
        'title'                 : $('#title').val(),
        'text'                  : $('#text').val(),
        'senddate'              : $('#senddate').val()
    };
    $.post('ajax/posts_create.php',formData,function(data){
    })
    .done(function(data){

        $('#createpostbutton').removeAttr('disabled');

        if ( !data.success) {
            toastr['error'](data.errors);
        }
        else {
            toastr['success']('محتوا با موفقیت ویرایش شد');
        }
    })
    .fail(function() {
            toastr['error']('مشکلی پیش آمده است . دوباره امتحان کنید');
    })
}