// JavaScript Document

	function load_ajax(){
		var user = $("input#lg_username").val();  
		var pass = $("input#lg_password").val();  
				if(user=="")
				{
					alert("Bạn chưa nhập tài khoản/ email");
					$("input#lg_username").focus();  
					return false;  
				}
			
				if(pass=="")
				{
					alert("Vui lòng nhập mật khẩu");
					$("input#lg_password").focus();  
					return false;  
				}

		$.ajax({
			url : "manipulation/pr_login.php",
			type : "post",
			dataType:"text",
			data : {
			
				 user_lg : $('#lg_username').val(), pas_lg : $('#lg_password').val()
			},
			success : function (result){
				
				$('#result_login').html(result);
				
			}
		});
	}
