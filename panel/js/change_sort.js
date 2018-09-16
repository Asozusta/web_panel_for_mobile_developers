function change_sort(){

 
    $('#changesortbutton').attr('disabled','true');


    var formData = {
        'form'               : 'changesort',
        'sortstring'         : $('#nestable_list_1_output').val()
    };

    $.post('ajax/change_sort.php',formData,function(data){

    })
    .done(function(data){

        $('#changesortbutton').removeAttr('disabled');


        toastr['success']('ترتیب محتواها با موفقیت تغییر کرد');
        window.location.replace("posts_list");

    })

    .fail(function() {

            toastr['error']('مشکلی پیش آمده است . دوباره امتحان کنید');

    })

}