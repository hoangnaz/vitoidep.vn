function confirm_succes_order(id_order,id_staff)
{
	if(confirm("Xác nhận đã giao và hoàn thành thanh toán cho hóa đơn này?"))
	{
		if(id_staff==1)
		{
			alert("Chưa phân công giao hàng, quá trình xác nhận không thể thực hiện");
		}
		else
		{
		window.location="ad_manipulation/update_order.php?id_order=" +id_order+"&status="+3;
		}
	}
}


function confirm_succes_import(id_import)
{
	if(confirm("Xác nhận nhập hàng thành công?"))
	{
	
		window.location="ad_manipulation/confirm_succes_import.php?id_import=" +id_import;
		
	}
}

function delete_import(id_import)
{
	if(confirm("Xác nhận hủy bỏ phiếu nhập?"))
	{
		window.location="ad_manipulation/delete_import_bill.php?id_import="+id_import;
	}
}


function delete_order(id_order,id_page)
{
	if(confirm("Xác nhận hủy bỏ đơn đặt hàng?"))
	{
		window.location="ad_manipulation/delete_order.php?id_order="+id_order+"&id_page="+id_page;
	}
}

function delete_catalog_blog(id,status)
{
	alert(123);
	if(confirm("Bạn thực sự muốn thu hồi quyền xuất bản danh mục này?"))
	{
		window.location="ad_manipulation/blog_delete_blog_catalog.php?id_catalog_blog=" + id+"&status="+ status;
	}
}

function delete_catalog(id,status)
{
	if(confirm("Bạn thực sự muốn thu hồi quyền xuất bản danh mục này?"))
	{
		window.location="ad_manipulation/delete_catalog.php?id_catalog=" + id+"&status="+ status;
	}
}

function recyecle_catalog_blog(id,status)
{
	if(confirm("Bạn thực sự muốn xuất bản danh mục này?"))
	{
		window.location="ad_manipulation/blog_delete_blog_catalog.php?id_catalog_blog=" + id+"&status="+ status;
	}
}

function recyecle_catalog(id,status)
{
	if(confirm("Bạn thực sự muốn xuất bản danh mục này?"))
	{
		window.location="ad_manipulation/delete_catalog.php?id_catalog=" + id+"&status="+ status;
	}
}
function delete_supplier(id,status)
{
	if(confirm("Bạn thực sự muốn xóa?"))
	{
		window.location="ad_manipulation/delete_supplier.php?id_supplier=" + id+"&status="+ status;
	}
}
function recyecle_supplier(id,status)
{
	if(confirm("Bạn thực sự khôi phục nhà cung cấp, nhà xuất bản này?"))
	{
		window.location="ad_manipulation/delete_supplier.php?id_supplier=" + id+"&status="+ status;
	}
}
function delete_staff(id,status)
{
	if(confirm("Bạn thực sự muốn xóa quyền nhân viên này?"))
	{
		window.location="ad_manipulation/delete_staff.php?id_staff=" + id+"&status="+ status;
	}
}
function recyecle_staff(id,status)
{
	if(confirm("Bạn thực sự muốn khôi phục nhân viên này?"))
	{
		window.location="ad_manipulation/delete_staff.php?id_staff=" + id+"&status="+ status;
	}
}
function delete_author(id,status)
{
	if(confirm("Bạn thực sự muốn xóa tác giả này?"))
	{
		window.location="ad_manipulation/delete_author.php?id_author=" + id+"&status="+ status;
	}
}
function recyecle_author(id,status)
{
	if(confirm("Bạn thực sự muốn khôi phục tác giả này?"))
	{
		window.location="ad_manipulation/delete_author.php?id_author=" + id+"&status="+ status;
	}
}
	
function delete_product(id,status)
{
	if(confirm("Bạn thực sự muốn xóa sản phẩm  này?"))
	{
		window.location="ad_manipulation/delete_product.php?id_product=" + id+"&status="+ status;
	}
}
	function recyecle_product(id,status)
	{
		if(confirm("Bạn thực sự muốn khôi phục sản phẩm này?"))
		{
			window.location="ad_manipulation/delete_product.php?id_product=" + id+"&status="+ status;
		}	
	}

