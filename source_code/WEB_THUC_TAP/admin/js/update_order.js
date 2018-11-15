// JavaScript Document
function upda_number(id_pro)
{	
	
    number_n=$("#update_number"+id_pro);
	 price_import_n=$("#update_price_import"+id_pro);
	 
    number=$("#update_number"+id_pro).val();
	 price_import=$("#update_price_import"+id_pro).val();
	 if(number<=0)
	{
		alert("Xin lỗi, số lượng nhập phải là số lớn và lớn hơn 0");
		number_n.select();
		return false;
		
	}
	if(number%1.0!=0)
	{
		alert("Xin lỗi, số lượng nhập phải là số nguyên và lớn hơn không.");
		number_n.select();
		return false;
		
	}
	if(price_import<=0)
	{
		alert("Xin lỗi, giá bán phải là số lớn và lớn hơn 0");
		price_import_n.select();
		return false;
		
	}
	if(price_import%1.0!=0)
	{
		alert("Xin lỗi, giá bán phải là số nguyên và lớn hơn không.");
		price_import_n.select();
		return false;
		
	}
			$.ajax({
			url : "ad_manipulation/pr_update_order.php",
			type : "post",
			dataType:"text",
			data : {
			
				 id_pro : id_pro, quatity:number,
				 import_price:price_import
			},
			success : function (result){
				
				
			}
		});	
		window.location="sub_import_bill.php";
	}
// JavaScript Document
