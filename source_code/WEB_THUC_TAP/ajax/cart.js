// JavaScript Document
function shopping_cart(id_pro)
{
			
			$.ajax({
			url : "manipulation/pr_add_cart.php",
			type : "post",
			dataType:"text",
			data : {
			
				 id : id_pro, number: 1
			},
			success : function (result){
				
				if(result!="")
				{
				alert(result);
				}
			}
		});
		
		
	}
