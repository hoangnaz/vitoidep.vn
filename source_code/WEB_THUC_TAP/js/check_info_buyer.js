// JavaScript Document

function check_info_buy()
{
	full_name=$("#full_name").val();
	full_name=full_name.trim();
	if(full_name=="")
	{
		 alert("Tên không thể chỉ chứa khoảng trắng");
		$("#full_name").select();	 
		return false;
	}
	phone=$("#phone").val();
	phone=phone.trim();
	if(phone.length<10 || phone.length>11)
	{
		alert("Vui lòng nhập điện thoại có độ dài từ 10-11 số");
		$("#phone").focus();	 
		return false;
	}
	address=$("#address").val();
	address=address.trim();
	if(address=="")
	{
		alert("Vui lòng nhập đia chỉ giao hàng");
		$("#address").focus();	 
		return false;
	}


	
}