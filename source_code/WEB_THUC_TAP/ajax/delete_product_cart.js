// JavaScript Document
function deleta_product_cart(id_pro)
{
	
	var kq=confirm("Bạn thực sự muốn xóa sản phẩm này?");
	if(kq==true)
	{
			$.ajax({
			url : "manipulation/delete_pro.php",
			type : "post",
			dataType:"text",
			data : {
			
				 id : id_pro
			},
			success : function (result){
				
				$('#shopping_cart').html(result);
				
			}
		});
		window.location="view_cart.php";
	}
}
