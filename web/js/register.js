function register(){
	var username = $('#username').val();
	var password = $('#password').val();
	var paraStr = '';
	paraStr = "username="+username+"&password="+password;
	$.ajax({
		url: registerUrl,
		type: "post",
		dataType: "text",
		data:paraStr,
		async: false,
		success: function (data) {
			alert('注册成功');
		},
		error:function(data){
			alert('注册失败');
			return false;
		}
	});
}

