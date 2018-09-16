

function acceptteam(item){

    var r = confirm("پذیرفتن درخواست\n درخواست را می پذیرید ؟\n");
    if (r == true) {

    var formData = {
            'form'               : 'accept',
            'id'                 :  item.id
           
        };  

    $.post('ajax/header.php',formData,function(data){

    if(data==1){

          window.location.replace("team_list");
    }
    })
 
        
    } else {
       
    }

}



function ignorteam(item){


    var r = confirm("رد کردن درخواست\n امکان پس گرفتن درخواست نیست مگر اینکه شما را دوباره دعوت کنند . مطمئن هستید ؟\n");
    if (r == true) {




var formData = {
        'form'               : 'ignor',
        'id'                 :  item.id
       
    };  

     

       $.post('ajax/header.php',formData,function(data){

if(data==1){

      window.location.reload();
}
    })
 
        
    } else {
       
    }

}


function delete_file (item){
 
  var r = confirm("حذف یک فایل\nدیگر به هیچ وجه در دسترس نخواهد بود .برای حذف فایل مطمئن هستید ؟\n");
    if (r == true) {

    var formData = {
        'form'               : 'delete_file',
        'id'                 :  item
       
    };  
       $.post('ajax/header.php',formData,function(data){
            if(data==1){
                  $('#file'+item).remove();
                  toastr['success']('با موفقیت حذف شد');
            }
            else {
                  toastr['error']('مشکلی در حذف فایل پیش آمده است<br>احتمالا شما اجازه ی حذف این فایل را ندارید');
            }
    })
    } else {
       
    }

}


function edit_file_config (item)
{
 edit_file_id = item;
}

function edit_file (item){

    var formData = {
        'form'               : 'edit_file',
        'name'               :  $("#edit_file_name").val(),
        'id'                 :  item
       
    };  
       $.post('ajax/header.php',formData,function(data){
            if(data==1){
                  $('#tr'+item+' td:nth-child(2) a').text($("#edit_file_name").val());
                  $('#edit_file').modal('toggle');
                  $("#edit_file_name").val('');
                  toastr['success']('با موفقیت ویرایش شد');
            }
            else {
                  $("#edit_file_name").val('');
                  toastr['error']('مشکلی در ویرایش فایل پیش آمده است<br>احتمالا شما اجازه ی ویرایش این فایل را ندارید');
            }
    })
    
}
