// JavaScript Document
function value_find(money)
{
	
			$.ajax({
			url : "manipulation/pr_price_find.php",
			type : "post",
			dataType:"text",
			data : {
			
				 f_money : money
			},
			success : function (result){
				
				$('#price_find').html(result);
				
			}
		});
		
		
	}
