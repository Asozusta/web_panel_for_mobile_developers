$(document).ready(function() {
	
	// enable fileuploader plugin
	$('input[name="files"]').fileuploader({
        changeInput: '<div class="fileuploader-input">' +
					      '<div class="fileuploader-input-inner">' +
						      '<img src="https://www.teroject.com/app/theme/version1/images/up.png">' +
							  '<h3 class="fileuploader-input-caption"><span>فایل را با موس بکشید</span></h3>' +
							  '<p>یا</p>' +
							  '<div class="fileuploader-input-button"><span>انتخاب کنید</span></div>' +
						  '</div>' +
					  '</div>',
        theme: 'dragdrop',
		upload: {
            url: 'ajax/ajax_upload_file.php',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: null,
            onSuccess: function(result, item) {
                var data = JSON.parse(result);
                
				// if success
                if (data.isSuccess && data.files[0]) {
                    item.name = data.files[0].name;
                    item.oldname = data.files[0].old_name;
                    item.size = data.files[0].size;
                    item.showsize = (item.size/1000000);
                    if(item.showsize<1) item.showsize = 'کمتر از 1';

                }
				
				// if warnings
				if (data.hasWarnings) {
					for (var warning in data.warnings) {
						// alert();
						toastr['error'](data.warnings);
					}
					
					item.html.removeClass('upload-successful').addClass('upload-failed');
					// go out from success function by calling onError function
					// in this case we have a animation there
					// you can also response in PHP with 404
					return this.onError ? this.onError(item) : null;
				}
		toastr['success'](item.oldname+'<br>با موفقیت آپلود شد');

		$('#uploadcenterfiles tr:first').after('<tr class="animated pulse infinite" style="background-color:#f5fffa;"><td><img src="https://teroject.com/app/theme/version1/img/uploadcenter/new.png" width="16" /></td><td  style="direction:ltr; text-align:right; max-width:150px; overflow:hidden;"><b><a href="../upload/files/'+item.name+'"  target="_blank">'+item.oldname+'</a></b></td><td>'+item.showsize+'</td><td>هم اکنون</td><td>شما</td></tr>');
                	


                item.html.find('.column-actions').append('<a class="fileuploader-action fileuploader-action-remove fileuploader-action-success" title="Remove"><i></i></a>');
                item.html.find('.column-title>div').html('<a href="../upload/files/'+item.name+'" target="_blank">'+item.oldname+'</a>');


                setTimeout(function() {
                    item.html.find('.progress-bar2').fadeOut(400);
                }, 400);
            },
            onError: function(item) {
				var progressBar = item.html.find('.progress-bar2');
				
				if(progressBar.length > 0) {
					progressBar.find('span').html(0 + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
					item.html.find('.progress-bar2').fadeOut(400);
				}
                
                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
                    '<a class="fileuploader-action fileuploader-action-retry" title="Retry"><i></i></a>'
                ) : null;
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-bar2');
				
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('span').html(data.percentage + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            },
            onComplete: null,
        },
		onRemove: function(item) {
			$.post('ajax/ajax_remove_file.php', {
				file: item.name
			});
		},
		captions: {
            feedback: 'فایل را با موس بکشید',
            feedback2: 'فایل را با موس بکشید',
            drop: 'فایل را با موس بکشید'
        },
	});





///////////////////////////////////////////////////////////////////////



// enable fileuploader plugin
    $('input[name="chat_files"]').fileuploader({
        changeInput: '<div class="fileuploader-input">' +
                          '<div class="fileuploader-input-inner">' +
                              '<div class="fileuploader-input-button"><span>یک عکس انتخاب کنید</span></div>' +
                          '</div>' +
                      '</div>',
        theme: 'dragdrop',
        upload: {
            url: 'ajax/chat_upload_file.php',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: null,
            onSuccess: function(result, item) {
                var data = JSON.parse(result);
                
                // if success
                if (data.isSuccess && data.files[0]) {
                    item.name = data.files[0].name;
                    item.oldname = data.files[0].old_name;
                    item.size = data.files[0].size;
                    item.showsize = (item.size/1000000);
                    if(item.showsize<1) item.showsize = 'کمتر از 1';

                }
                
                // if warnings
                if (data.hasWarnings) {
                    for (var warning in data.warnings) {
                        // alert();
                        toastr['error'](data.warnings);
                    }
                    
                    item.html.removeClass('upload-successful').addClass('upload-failed');
                    // go out from success function by calling onError function
                    // in this case we have a animation there
                    // you can also response in PHP with 404
                    return this.onError ? this.onError(item) : null;
                }
                
                toastr['success']('با موفقیت ارسال شد');
                $('.modal').modal('hide');

                setTimeout(function() {
                    item.html.find('.progress-bar2').fadeOut(400);
                }, 400);
            },
            onError: function(item) {
                var progressBar = item.html.find('.progress-bar2');
                
                if(progressBar.length > 0) {
                    progressBar.find('span').html(0 + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
                    item.html.find('.progress-bar2').fadeOut(400);
                }
                
                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
                    ''
                ) : null;
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-bar2');
                
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('span').html(data.percentage + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            },
            onComplete: null,
        },
        onRemove: function(item) {
            $.post('ajax/ajax_remove_file.php', {
                file: item.name
            });
        },
        captions: {
            feedback: 'فایل را با موس بکشید',
            feedback2: 'فایل را با موس بکشید',
            drop: 'فایل را با موس بکشید'
        },
    });

	
});