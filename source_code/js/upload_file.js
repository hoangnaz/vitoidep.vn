function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();
    
      reader.onload = function(e) {
        $('#img-avatar').attr('src', e.target.result);
      }
  
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#image-avt").change(function() {
    readURL(this);
  });