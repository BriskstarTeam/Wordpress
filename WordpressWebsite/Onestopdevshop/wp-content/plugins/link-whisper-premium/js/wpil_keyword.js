"use strict";

(function ($) {
    $(document).on('click', '#wpil_keywords_table .delete', wpil_keyword_delete);
    $(document).on('click', '#wpil_keywords_settings i', wpil_keyword_settings_show);
    $(document).on('click', '.link-whisper_page_link_whisper_keywords .column-keyword .dashicons', wpil_keyword_local_settings_show);
    $(document).on('click', '#wpil_keywords_settings input[type="submit"]', wpil_keyword_clear_fields);
    $(document).on('click', '#add_keyword_form a', wpil_keyword_add);
    $(document).on('click', '.wpil_keyword_local_settings_save', wpil_keyword_local_settings_save);
    $(document).on('click', '#wpil_keywords_reset_button', wpil_keyword_reset);

    if (is_wpil_keyword_reset) {
        wpil_keyword_reset_process(2, 1);
    }

    function wpil_keyword_delete() {
        if (confirm("Are you sure you want to delete this keyword?")) {
            var el = $(this);
            var id = el.data('id');

            $.post(ajaxurl, {
                action: 'wpil_keyword_delete',
                id: id
            }, function(){
                el.closest('tr').fadeOut(300);
            });
        }
    }

    function wpil_keyword_settings_show() {
        $('#wpil_keywords_settings .block').toggle();
    }

    function wpil_keyword_local_settings_show() {
        $(this).closest('td').find('.block').toggle();
    }

    $(document).on('click', '.wpil-keywords-restrict-cats-show', wpilShowRestrictCategoryList);
    function wpilShowRestrictCategoryList(){
        var button = $(this);
        button.parents('.block').find('.wpil-keywords-restrict-cats').toggle();
        button.toggleClass('open');
    }

    function wpil_keyword_clear_fields() {
        $('input[name="keyword"]').val('');
        $('input[name="link"]').val('');
    }

    function wpil_keyword_add() {
        var form = $('#add_keyword_form');
        var keyword = form.find('input[name="keyword"]').val();
        var link = form.find('input[name="link"]').val();
        form.find('input[type="text"]').hide();
        form.find('.progress_panel').show();
        var params = {
            keyword: keyword,
            link: link,
            wpil_keywords_add_same_link: $('#wpil_keywords_add_same_link').prop('checked') ? 1 : 0,
            wpil_keywords_link_once: $('#wpil_keywords_link_once').prop('checked') ? 1 : 0,
            wpil_keywords_restrict_to_cats: $('#wpil_keywords_restrict_to_cats').prop('checked') ? 1 : 0,
        };

        if($('#wpil_keywords_restrict_to_cats').is(':checked')){
            var selectedCats = [];
            $('.wpil-restrict-keywords-input:checked').each(function(index, element){
                selectedCats.push($(element).data('term-id'));
            });

            params['restricted_cats'] = selectedCats; 
        }

        wpil_keyword_process(null, 0, form, params);
    }

    function wpil_keyword_local_settings_save() {
        var keyword_id = $(this).data('id');
        var form = $(this).closest('.local_settings');
        form.find('.block').hide();
        form.find('.progress_panel').show();
        var params = {
            wpil_keywords_add_same_link: form.find('input[type="checkbox"][name="wpil_keywords_add_same_link"]').prop('checked') ? 1 : 0,
            wpil_keywords_link_once: form.find('input[type="checkbox"][name="wpil_keywords_link_once"]').prop('checked') ? 1 : 0,
            wpil_keywords_restrict_to_cats: form.find('input[type="checkbox"][name="wpil_keywords_restrict_to_cats"]').prop('checked') ? 1 : 0
        };

        if(params.wpil_keywords_restrict_to_cats){
            var selectedCats = [];
            form.find('input.wpil-restrict-keywords-input[type="checkbox"]:checked').each(function(index, element){
                selectedCats.push($(element).data('term-id'));
            });

            params['restricted_cats'] = selectedCats; 
        }


        wpil_keyword_process(keyword_id, 0, form, params);
    }

    function wpil_keyword_process(keyword_id, total, form, params = {}) {
        var data = {
            action: 'wpil_keyword_add',
            nonce: wpil_keyword_nonce,
            keyword_id: keyword_id,
            total: total
        }

        for (var key in params) {
            data[key] = params[key];
        }

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: data,
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Error', textStatus + "\n\n" + jqXHR.responseText, 'error').then(wpil_keyword_process(keyword_id, keyword, link));
            },
            success: function(response){
                if (response.error) {
                    swal(response.error.title, response.error.text, 'error');
                    return;
                }

                form.find('.progress_count').text(parseInt(response.progress) + '%');
                if (response.finish) {
                    location.reload();
                } else {
                    if (response.keyword_id && response.total) {
                        wpil_keyword_process(response.keyword_id, response.total, form);
                    }
                }
            }
        });
    }

    function wpil_keyword_reset() {
        $('#wpil_keywords_table .table').hide();
        $('#wpil_keywords_table .progress').show();
        wpil_keyword_reset_process(1, 1);
    }

    function wpil_keyword_reset_process(count, total) {
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: 'wpil_keyword_reset',
                nonce: wpil_keyword_nonce,
                count: count,
                total: total,
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Error', textStatus + "\n\n" + jqXHR.responseText, 'error').then(wpil_keyword_reset_process(1, 1));
            },
            success: function(response){
                if (response.error) {
                    swal(response.error.title, response.error.text, 'error');
                    return;
                }

                var progress = Math.floor((response.ready / response.total) * 100);
                $('#wpil_keywords_table .progress .progress_count').text(progress + '%' + ' ' + response.ready + '/' + response.total);
                if (response.finish) {
                    location.reload();
                } else {
                    wpil_keyword_reset_process(response.count, response.total)
                }
            }
        });
    }
})(jQuery);