"use strict";

(function ($) {
    $(document).on('change', '#wpil_links_table_filter select', wpil_report_filter);
    $(document).on('click', '#wpil_links_table_filter .button-primary', wpil_report_filter_submit);

    function wpil_report_filter() {
        var block = $('#wpil_links_table_filter');

        var post_type = block.find('select[name="post_type"]').val();
        if (post_type != 0 && post_type !== 'post') {
            block.find('select[name="category"]').val(0).prop('disabled', true);
        } else {
            block.find('select[name="category"]').prop('disabled', false);
        }

        var category = block.find('select[name="category"]').val();
        if (category != 0) {
            block.find('select[name="post_type"]').val('post');
        }
    }
    wpil_report_filter();

    function wpil_report_filter_submit() {
        var block = $(this).closest('div');
        var post_type = block.find('select[name="post_type"]').val();
        var category = block.find('select[name="category"]').val();
        var loc = block.find('select[name="location"]').val();
        var url = admin_url + 'admin.php?page=link_whisper&type=links&post_type=' + post_type + '&category=' + category;

        if (typeof yourvar !== 'undefined') {
            url += '&location=' + loc;
        }

        location.href = url;
    }

    setInterval(function(){
        $.post(ajaxurl, {
            action: 'wpil_report_reload',
        }, function(response){
            if (response == 'yes') {
                location.reload();
            }
        });
    }, 5000);
})(jQuery);