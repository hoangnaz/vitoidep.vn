// JavaScript Document
function ajax_inport_order(id_pro)
{
		$.ajax({
			url : "ad_manipulation/pr_import_order.php",
			type : "post",
			dataType:"text",
			data : {
			
				 id : id_pro
			},
			success : function (result){
				$('#cart').html(result);
				
				
			}
		});
}