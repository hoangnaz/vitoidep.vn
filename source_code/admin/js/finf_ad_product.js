
	// JavaScript Document

	function find_product(){
	
	info_f=$("#info_find");	
	info=$("#info_find").val().trim();	
	if(info=="")
	{
		alert("Chưa nhập nội dung");
		info_f.focus();
		$("#content_list_product").fadeIn();
		$('#content_find').fadeOut();
	}
	if(info!="")
	{
		$("#content_list_product").fadeOut();
		$.ajax({
			url : "ad_manipulation/ad_pr_find.php",
			type : "post",
			dataType:"text",
			data : {
			
				 content : info
			},
			success : function (result){
				
				$('#content_find').html(result);
				
			}
		});
	}
	
}

	// JavaScript Document