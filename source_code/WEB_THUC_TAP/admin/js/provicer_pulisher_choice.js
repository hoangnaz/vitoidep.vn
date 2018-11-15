// JavaScript Document
function provicer_publisher(pu_pro)
{
	
		
		$.ajax({
			url : "ad_manipulation/provicer_pulisher.php",
			type : "post",
			dataType:"text",
			data : {
			
				 pro_pub : pu_pro
			},
			success : function (result){
				
				$('#report_pro_pub').html(result);
				
			}
		});
	
}