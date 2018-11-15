<HTML>
<HEAD>
<TITLE>AJAX Pagination with PHP</TITLE>
<style>

.link {padding: 10px 15px;background: transparent;border:#bccfd8 1px solid;border-left:0px;cursor:pointer;color:#607d8b}
.disabled {cursor:not-allowed;color: #bccfd8;}
.current {background: #bccfd8;}
.first{border-left:#bccfd8 1px solid;}
.question {font-weight:bold;}
.answer{padding-top: 10px;}
#pagination{margin-top: 20px;padding-top: 30px;border-top: #F0F0F0 1px solid;}
.dot {padding: 10px 15px;background: transparent;border-right: #bccfd8 1px solid;}
#overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
#overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}

.pagination-setting {padding:10px; margin:5px 0px 10px;border:#bccfd8  1px solid;color:#607d8b;}
</style>
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script>
function getresult(url) {
	var ten="son_gac";
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),kubun:ten},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function() 
		{} 	        
   });
}

</script>
</HEAD>
<BODY>
<div id="overlay">
	<div>
		<img src="loading.gif" width="64px" height="64px"/>
	</div>
</div>

	<div id="pagination-result">
		<input type="hidden" name="rowcount" id="rowcount" />
	</div>

<script>
getresult("getresult.php");
</script>
</BODY>
</HTML>
