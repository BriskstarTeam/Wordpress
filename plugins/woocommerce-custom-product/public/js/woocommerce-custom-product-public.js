function readURL(input) {
	if (input.files && input.files[0]) {
	  var reader = new FileReader();
  
	  reader.onload = function (e) {
		jQuery('#prev_image').show();  
		jQuery('.reset_image').show();
		jQuery('#prev_image').attr('src', e.target.result).width("auto").height(200);
	  };
  
	  reader.readAsDataURL(input.files[0]);
	}
  }
jQuery( document ).ready(function() {
    jQuery("#image_upload_custom").on("click",".reset_image",function(e){
		e.preventDefault();
		if(confirm("Are you sure you want to remove this image?")){
			jQuery("#cus_file").val('');
			jQuery(".reset_image").hide();
			jQuery("#prev_image").hide();
		}
	});
});