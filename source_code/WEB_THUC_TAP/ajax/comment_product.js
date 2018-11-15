// JavaScript Document
function comment_product(id_product)
{
	var text_comment = $('textarea#content_comment').val();
	
			$.ajax({
			url : "manipulation/pr_comment_product.php",
			type : "post",
			dataType:"text",
			data : {
			
				 id_ro : id_product, content:text_comment
			},
			success : function (result){
				
				$('#comment_report').html(result);
				
			}
		});	
	
}