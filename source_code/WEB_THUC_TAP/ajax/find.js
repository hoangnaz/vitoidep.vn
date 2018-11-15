
	// JavaScript Document

	function find_product(){
		$("#login_content").fadeOut();
		$("#list_author").fadeOut();
		$("#title_catalog").hide();
		$("#list_product").hide();
		$("#list_book_sale").hide();
		$("#content_detail").hide();
		$("#view_cart").hide();
		$(".title_catalog_detail").hide();
		
		$.ajax({
			url : "manipulation/pr_find.php",
			type : "post",
			dataType:"text",
			data : {
			
				 content : $('#info_find').val()
			},
			success : function (result){
				
				$('#list_product_find').html(result);
				
			}
		});
	}

	// JavaScript Document