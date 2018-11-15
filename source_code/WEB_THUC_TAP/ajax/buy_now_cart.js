// JavaScript Document
function buy_now(id_pro)
{
	
			$.ajax({
			url : "manipulation/pr_add_cart.php",
			type : "post",
			dataType:"text",
			data : {
			
				 id : id_pro, number: 1
			},
			success : function (result){
				
				$('#cc').html(result);
				
			}
		});
		
		window.location="buy.php";
	}
