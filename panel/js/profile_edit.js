function form1(){

    $('#form1 div.alert-success').remove(); 
    $('#form1 div.alert-warning').remove(); 
    $find = $('input[name="fname"],input[name="lname"],input[name="mobile"],input[name="email"]').parent().parent();
    $find.removeClass('has-error'); 
    $('#form1 div.help-block').remove(); 
    $('#form1 input').attr('disabled','true');

    $('#loading').show().css('display','inline-block');

    var formData = {
        'form'               : 1,
        'fname'              : $('input[name="fname"]').val(),
        'lname'              : $('input[name="lname"]').val(),
        'email'              : $('input[name="email"]').val(),
        'mobile'   			 : $('input[name="mobile"]').val()
    };

    
    $.post('ajax/profile_edit.php',formData,function(data){

    })
    .done(function(data){

        $('#form1 input').removeAttr('disabled');
        $('#loading').hide();

        if ( !data.success) {

            if (data.errors.fname) {
            	$find = $('input[name="fname"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.fname + '</div>'); 
            }
            if (data.errors.lname) {
            	$find = $('input[name="lname"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.lname + '</div>'); 
            }
            if (data.errors.mobile) {
            	$find = $('input[name="mobile"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.mobile + '</div>'); 
            }
            if (data.errors.email) {
            	$find = $('input[name="email"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.email + '</div>'); 
            }
            
        }
        else {

            $('#form1 div.alert-success').remove(); 
            window.location.replace("dashboard");
        }

    })

    .fail(function() {

        $('#form1 div.alert-warning').remove(); 
        $('form[id="form1"').append('<div class="alert alert-warning">' + 'مشکلی در برقراری ارتباط پیش آمده است , بعدا امتحان کنید' + '</div>');

    })

}


function form2(){

    $('#form2 div.alert-success').remove(); 
    $('#form2 div.alert-warning').remove(); 
    $find = $('input[name="phone"],input[name="about_me"],input[name="website"]').parent().parent();
    $find.removeClass('has-error'); 
    $('#form2 div.help-block').remove(); 
    $('#form2 textarea,select,input').attr('disabled','true');
    $('#loading').show().css('display','inline-block');

    var formData = {
        'form'                       : 2,
        'phone'                      : $('input[name="phone"]').val(),
        'job'                        : $('input[name="job"]').val(),
        'tavalod'                    : $('input[name="tavalod"]').val(),
        // 'tahsilat'                   : $('select[name="tahsilat"] option:selected').val(),
        /*'rooz-tavalod'               : $('select[name="rooz-tavalod"] option:selected').val(),
        'mah-tavalod'                : $('select[name="mah-tavalod"] option:selected').val(),
        'sal-tavalod'                : $('select[name="sal-tavalod"] option:selected').val(),*/
        'city'                       : $('select[name="city"] option:selected').val(),
        'state'                      : $('select[name="state"] option:selected').val(),
        'about_me'                   : $('textarea[name="about_me"]').val(),
        'website'                    : $('input[name="website"]').val()
    };

    
    $.post('ajax/profile_edit.php',formData,function(data){
      
    })
    .done(function(data){




       $('#form2 textarea,select,input').removeAttr('disabled');
        $('#loading').hide();

        if ( !data.success) {
         
            if (data.errors.phone) {
                $find = $('input[name="phone"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.phone + '</div>'); 
            }
            if (data.errors.about_me) {
                $find = $('input[name="about_me"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.about_me + '</div>'); 
            }
            if (data.errors.website) {
                $find = $('input[name="website"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.website + '</div>'); 
            }
          
            
        }
        else {

            $('#form2 div.alert-success').remove(); 
            $('form[id="form2"]').append('<div class="alert alert-success">' + data.message + '</div>');

        }

    })
    
    .fail(function() {
        
        $('#form2 div.alert-warning').remove(); 
        $('form[id="form2"').append('<div class="alert alert-warning">' + 'مشکلی در برقراری ارتباط پیش آمده است , بعدا امتحان کنید' + '</div>');

    })
    
}

function form3(){

function checkCodeMeli(code)
{
  
  var L=code.length;
  
  if(L<8 || parseInt(code,10)==0) return false;
  code=('0000'+code).substr(L+4-10);
  if(parseInt(code.substr(3,6),10)==0) return false;
  var c=parseInt(code.substr(9,1),10);
  var s=0;
  for(var i=0;i<9;i++)
    s+=parseInt(code.substr(i,1),10)*(10-i);
  s=s%11;
  return (s<2 && c==s) || (s>=2 && c==(11-s));
return true;
}


  var c=      document.getElementById("melli").value;
  if( checkCodeMeli(c))
   $result =  document.getElementById("melli").value;
  else
   $result  = "error";
 


    $('#form3 div.alert-success').remove(); 
    $('#form3 div.alert-warning').remove(); 
    $find = $('input[name="melli"],input[name="shenasname"],input[name="father"],input[name="postcode"],input[name="address"]').parent().parent();
    $find.removeClass('has-error'); 
    $('#form3 div.help-block').remove(); 
    $('#form3 input').attr('disabled','true');
    $('#loading').show().css('display','inline-block');

    var formData = {
        'form'                       : 3,
        'melli'                      : $result,
        'shenasname'                 : $('input[name="shenasname"]').val(),
        'father'                     : $('input[name="father"]').val(),
        'address'                    : $('input[name="address"]').val(),
        'postcode'                   : $('input[name="postcode"]').val()
    };

    
    $.post('ajax/profile_edit.php',formData,function(data){
      
    })
    .done(function(data){




       $('#form3 input').removeAttr('disabled');
        $('#loading').hide();

        if ( !data.success) {
         
            if (data.errors.melli) {
                $find = $('input[name="melli"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.melli + '</div>'); 
            }
            if (data.errors.shenasname) {
                $find = $('input[name="shenasname"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.shenasname + '</div>'); 
            }
            if (data.errors.father) {
                $find = $('input[name="father"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.father + '</div>'); 
            }
             if (data.errors.address) {
                $find = $('input[name="address"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.address + '</div>'); 
            }
            if (data.errors.postcode) {
                $find = $('input[name="postcode"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.postcode + '</div>'); 
            }
          
            
        }
        else {

            $('#form3 div.alert-success').remove(); 
            $('form[id="form3"]').append('<div class="alert alert-success">' + data.message + '</div>');

        }

    })
    
    .fail(function() {
        
        $('#form3 div.alert-warning').remove(); 
        $('form[id="form3"').append('<div class="alert alert-warning">' + 'مشکلی در برقراری ارتباط پیش آمده است , بعدا امتحان کنید' + '</div>');

    })
    
}




function form4(){

 
    $('#form4 div.alert-success').remove(); 
    $('#form4 div.alert-warning').remove(); 
    $find = $('input[name="c_pwd"],input[name="n_pwd"],input[name="rt_pwd"]').parent().parent();
    $find.removeClass('has-error'); 
    $('#form4 div.help-block').remove(); 
    $('#form4 input').attr('disabled','true');
    $('#loading').show().css('display','inline-block');

    var formData = {
        'form'                       : 4,
        'c_pwd'                      : $('input[name="c_pwd"]').val(),
        'n_pwd'                      : $('input[name="n_pwd"]').val(),
        'rt_pwd'                     : $('input[name="rt_pwd"]').val()
    };

    
    $.post('ajax/profile_edit.php',formData,function(data){
      
    })
    .done(function(data){




       $('#form4 input').removeAttr('disabled');
        $('#loading').hide();

        if ( !data.success) {
         
            if (data.errors.c_pwd) {
                $find = $('input[name="c_pwd"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.c_pwd + '</div>'); 
            }
            if (data.errors.n_pwd) {
                $find = $('input[name="n_pwd"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.n_pwd + '</div>'); 
            }
            if (data.errors.rt_pwd) {
                $find = $('input[name="rt_pwd"]').parent().parent();
                $find.addClass('has-error'); 
                $find.append('<div class="help-block">' + data.errors.rt_pwd + '</div>'); 
            }
             
            
        }
        else {

            $('#form4 div.alert-success').remove(); 
            $('form[id="form4"]').append('<div class="alert alert-success">' + data.message + '</div>');

        }

    })
    
    .fail(function() {
        
        $('#form4 div.alert-warning').remove(); 
        $('form[id="form4"').append('<div class="alert alert-warning">' + 'مشکلی در برقراری ارتباط پیش آمده است , بعدا امتحان کنید' + '</div>');

    })
    
}


