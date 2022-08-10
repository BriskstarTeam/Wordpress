<?php

if (!class_exists('WP_List_Table')) {
    require_once ( ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Class Wpil_Table_Error
 */
class Wpil_Table_Error extends WP_List_Table
{
    function get_columns()
    {
        return [
            'checkbox' => '<input type="checkbox" id="wpil_check_all_errors" />',
            'post' => __('Post', 'wpil'),
            'url' => __('Broken URL', 'wpil'),
            'sentence' => __('Sentence', 'wpil'),
            'type' => __('Type', 'wpil'),
            'code' => __('Status', 'wpil'),
            'created' => __('Discovered', 'wpil'),
            'actions' => '',
        ];
    }

    function prepare_items()
    {
        //pagination
        $options = get_user_meta(get_current_user_id(), 'report_options', true);
        $per_page = !empty($options['per_page']) ? $options['per_page'] : 20;
        $page = isset($_REQUEST['paged']) ? (int)$_REQUEST['paged'] : 1;
        $orderby = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';

        $columns = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = [$columns, $hidden, $sortable];
        $data = Wpil_Error::getData($per_page, $page, $orderby, $order);
        $this->items = $data['links'];

        $this->set_pagination_args(array(
            'total_items' => $data['total'],
            'per_page' => $per_page,
            'total_pages' => ceil($data['total'] / $per_page)
        ));
    }

    function column_default($item, $column_name)
    {
        switch($column_name) {
            case 'checkbox':
                return '<input type="checkbox" data-id="' . $item->id . '" />';
            case 'url':
                return '<a class="wpil-error-report-url" href="' . $item->$column_name . '" target="_blank">' . $item->$column_name . '</a>
                        <div class="wpil-error-report-url-edit-wrapper">
                            <input class="wpil-error-report-url-edit" type="text" value="' . $item->$column_name . '">
                            <button class="wpil-error-report-url-edit-confirm wpil-error-edit-link-btn">
                                <i class="dashicons dashicons-yes"></i>
                            </button>
                            <button class="wpil-error-report-url-edit-cancel wpil-error-edit-link-btn">
                                <i class="dashicons dashicons-no"></i>
                            </button>
                        </div>
                        <div class="row-actions">
                            <span class="ignore">' . $item->ignore_link . '</span> | 
                            <span class="edit">' . $item->edit_link . '</span>
                        </div>';
            case 'created':
                return date('d M Y (H:i)', strtotime($item->created));
            case 'code':
                $class = ($item->code > 403 && $item->code < 500) ? 'code-red': 'code-orange';
                return '<span class="' . $class . '">' . Wpil_Error::getCodeMessage($item->code, true) . '</span>';
            case 'type':
                return $item->internal ? 'internal' : 'external';
            case 'actions':
                return $item->delete_icon;
            default:
                return $item->{$column_name};
        }
    }

    function get_sortable_columns()
    {
        return [
            'post' => ['post', false],
            'type' => ['internal', false],
            'code' => ['code', false],
            'created' => ['created', false],
        ];
    }

    function extra_tablenav( $which ) {
        global $wpdb;

        $codes = [];
        $result = $wpdb->get_results("SELECT DISTINCT code FROM {$wpdb->prefix}wpil_broken_links ORDER BY code ASC");
        foreach ($result as $item) {
            $codes[] = $item->code;
        }
        $current_codes = !empty($_GET['codes']) ? explode(',', $_GET['codes']) : array(6, 7, 28, 404, 451, 500, 503, 925);

        if ( $which == "top" ){
            ?>
            <div class="alignleft actions bulkactions" id="error_table_code_filter">
                <a href="javascript:void(0)" id="wpil_error_delete_selected" class="button-primary button-disabled">Delete Selected</a>
                <div class="codes">
                    <div class="item closed">Status Codes <i class="dashicons dashicons-arrow-down"></i><i class="dashicons dashicons-arrow-up"></i></div>
                    <?php foreach ($codes as $code) : ?>
                        <div class="item">
                            <input type="checkbox" name="code" data-code="<?= $code ?>" <?= in_array($code, $current_codes) ? 'checked' : '' ?>> <?= Wpil_Error::getCodeMessage($code, true); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <span class="button-primary" id="wpil_error_filter">Search</span>
            </div>
            <?php
        }
    }
}
