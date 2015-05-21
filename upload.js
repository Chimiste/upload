/*Change cover photo page*/
function ajaxFileUpload(url, selector, ref) {

	var formData = new FormData($("form"+selector)[0]);

	
	$.ajax({
		type: 'POST',
		contentType :'multipart/form-data',
		url:  url,
		data: formData,
		dataType:"json",
		async: false,
		beforeSend:function(){
	
		},
		success: function (data) {

			if(data.status == 1){
			  if(data.ref=="user_photo"){
				$('#user_photo').val(data.msg);  
				document.getElementById('user_photo_id').src = user_pic_dir+data.msg;
			  }
	
			}
			else {
				
			}
		},
		complete:function(){
           hide('.ajaxLoader');
		   
		},
		cache: false,
		contentType: false,
		processData: false
	});

}
