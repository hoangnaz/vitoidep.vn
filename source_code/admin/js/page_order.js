// JavaScript Document
function order_list(page)
{
	if(page==1)
	{
		window.location='mn_order.php';
	}
	else if(page==2)
	{
		window.location='mn_order_payment.php';
	}
	else if(page==3)
	{
		window.location='mn_order_finnish.php';
	}
}