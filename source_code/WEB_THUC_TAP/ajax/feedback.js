// JavaScript Document

	function send_feedback(){
		var content=document.getElementById("content_repon");
		if(content.value=="")
		{
			alert("Bạn chưa điền nội dung phản hồi");
			content.focus();
			return false;
		}
		else
		{
		$.ajax({
			url : "manipulation/pr_contact.php",
			type : "post",
			dataType:"text",
			data : {
			
				 content_rp : $('#content_repon').val()
			},
			success : function (result){
				
				$('#result_feedback').html(result);
				
			}
		});
		}
	}
