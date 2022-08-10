jQuery( document ).ready(function() {
    jQuery(".wpcf7-form").on("change",".service_selection",function(){
        var select_val = jQuery(this).val();
        if(select_val == "Hour based"){
            jQuery(".start_end_col").show();
        }
        else{
            jQuery(".start_end_col").hide();
        }
    })
});