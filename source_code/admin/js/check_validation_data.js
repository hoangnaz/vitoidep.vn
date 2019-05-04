	function readURL(input) {

		if (input.files && input.files[0]) {
		var reader = new FileReader();
	
		reader.onload = function(e) {
			$('#img_avt').attr('src', e.target.result);
		}
	
		reader.readAsDataURL(input.files[0]);
		}
	}

	function auto_load_img(){
	//catalog name check
	$("#img_content").change(function() {
		readURL(this);
	});
	$("#img_content").show();
	}

  
// add blog content
	function check_content_add_write(){
		
		blogName=$(".txt_blog_name").val();
		blogName=blogName.trim();
		if(blogName=="")
		{
			alert("Chưa nhập tiêu đề của blog.");
			$(".txt_blog_name").select();
			return false;
		}
		if(blogName.length > 300)
		{
			alert("Độ dài tiêu đề tối đa là 300");
			$(".txt_blog_name").select();
			return false;
		}

		// check content description blog
		var contentDescription = CKEDITOR.instances['txt_describle_blog'].getData();
		contentDescription=contentDescription.trim();
		if(contentDescription=="")
		{
		alert("Chưa nhập mô tả");
		CKEDITOR.instances['txt_describle_blog'].focus();
		return false;
		}
		if(contentDescription.length >= 500)
		{
		alert("Độ dài mô tả tối đa là 500");
		CKEDITOR.instances['txt_describle_blog'].focus();
		return false;
		}

		// check sumary description blog
		var content = CKEDITOR.instances['txt_content_blog'].getData();
		content=content.trim();
		if(content=="")
		{
		alert("Chưa nhập tóm tắt nội dung catalog blog");
		CKEDITOR.instances['txt_content_blog'].focus();
		return false;
		}
		if(content.length >= 10000)
		{
		alert("Nội dung bài viết tối đa là 10000");
		CKEDITOR.instances['txt_content_blog'].focus();
		return false;
		}
	}
	
	
	function check_catalog_blog()
	{
	
		//catalog name check
		catalogName=$(".txt_catalog_blog_name").val();
		catalogName=catalogName.trim();
		if(catalogName=="")
		{
			alert("Chưa nhập tên catalog của blog.");
			$(".txt_catalog_blog_name").select();
			return false;
		}

		// check content description blog
		var contentDescription = CKEDITOR.instances['txt_describle_catalog_blog'].getData();
		contentDescription=contentDescription.trim();
		if(contentDescription=="")
		{
		alert("Chưa nhập mô tả");
		CKEDITOR.instances['txt_describle_catalog_blog'].focus();
		return false;
		}
		if(contentDescription.length >= 1000)
		{
		alert("Độ dài mô tả tối đa là 1000");
		CKEDITOR.instances['txt_describle_catalog_blog'].focus();
		return false;
		}

			// check sumary description blog
			var contentSumary = CKEDITOR.instances['txt_sumary_catalog_blog'].getData();
			contentSumary=contentSumary.trim();
		if(contentSumary=="")
		{
		alert("Chưa nhập tóm tắt nội dung catalog blog");
		CKEDITOR.instances['txt_sumary_catalog_blog'].focus();
		return false;
		}
		if(contentSumary.length >= 300)
		{
		alert("Độ dài mô tả tối đa là 300");
		CKEDITOR.instances['txt_sumary_catalog_blog'].focus();
		return false;
		}

	}

	function check_catalog_blog_update(id)
	{
		//catalog name check
		catalogName=$(".txt_catalog_blog_name").val();
		catalogName=catalogName.trim();
		if(catalogName=="")
		{
			alert("Chưa nhập tên catalog của blog.");
			$(".txt_catalog_blog_name").select();
			return false;
		}

		// check content description blog
		var contentDescription = CKEDITOR.instances['txt_describle_catalog_blog'+id].getData();
		contentDescription=contentDescription.trim();
		if(contentDescription=="")
		{
		alert("Chưa nhập mô tả");
		CKEDITOR.instances['txt_describle_catalog_blog'+id].focus();
		return false;
		}
		if(contentDescription.length >= 1000)
		{
		alert("Độ dài mô tả tối đa là 1000");
		CKEDITOR.instances['txt_describle_catalog_blog'+id].focus();
		return false;
		}

			// check sumary description blog
			var contentSumary = CKEDITOR.instances['txt_sumary_catalog_blog'+id].getData();
			contentSumary=contentSumary.trim();
		if(contentSumary=="")
		{
		alert("Chưa nhập tóm tắt nội dung catalog blog");
		CKEDITOR.instances['txt_sumary_catalog_blog'+id].focus();
		return false;
		}
		if(contentSumary.length >= 300)
		{
		alert("Độ dài mô tả tối đa là 300");
		CKEDITOR.instances['txt_sumary_catalog_blog'+id].focus();
		return false;
		}

	}