// JavaScript Document
function upda(id_pro,quantity_inventory)
{	
	check_number=$("#update_number"+id_pro);
	number=$("#update_number"+id_pro).val();
	
	if(number>quantity_inventory)
	{
		alert("Xin lỗi, hiện tại chúng tôi còn "+quantity_inventory+" cho sản phẩm này");
		check_number.select();
		return false;
	}
	if(number<=0)
	{
		alert("Xin lỗi, số lượng phải là số lớn và lớn hơn 0");
		check_number.select();
		return false;
		
	}
	if(number%1.0!=0)
	{
		alert("Xin lỗi, sản phẩm phải là số nguyên và lớn hơn không.");
		check_number.select();
		return false;
		
	}
		 number=$("#update_number"+id_pro).val();
			$.ajax({
			url : "manipulation/pr_update.php",
			type : "post",
			dataType:"text",
			data : {
			
				 id_ro : id_pro, quatity:number
			},
			success : function (result){
				
				$('#aaaaaa').html(result);
				
			}
		});	
		window.location="view_cart.php";
	
   
}
