<?php

if (!class_exists('WP_List_Table')) {
    require_once ( ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Class Wpil_Table_Domain
 */
class Wpil_Table_Keyword extends WP_List_Table
{
    function get_columns()
    {
        return [
            'keyword' => 'Keyword',
            'link' => 'Link',
            'links' => 'Links Added',
            'actions' => '',
        ];
    }

    function prepare_items()
    {
        $per_page = 20;
        $page = isset($_REQUEST['paged']) ? (int)$_REQUEST['paged'] : 1;
        $search = !empty($_GET['s']) ? $_GET['s'] : '';
        $orderby = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';

        $columns = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = [$columns, $hidden, $sortable];
        $data = Wpil_Keyword::getData($per_page, $page, $search, $orderby, $order);
        $this->items = $data['keywords'];

        $this->set_pagination_args(array(
            'total_items' => $data['total'],
            'per_page' => $per_page,
            'total_pages' => ceil($data['total'] / $per_page)
        ));
    }

    function column_default($item, $column_name)
    {
        switch($column_name) {
            case 'keyword':
                $terms = Wpil_Term::getAllCategoryTerms();
                $cat_selector = '';
                if(!empty($terms)){
                    $restricted_cats = explode(',', $item->restricted_cats);
                    $cat_selector ='
                    <div class="wpil_keywords_restrict_to_cats_container">
                        <input type="hidden" name="wpil_keywords_restrict_to_cats" value="0" />
                        <input type="checkbox" class="wpil_keywords_restrict_to_cats" name="wpil_keywords_restrict_to_cats" ' . (!empty($item->restrict_cats)?'checked':'') . ' value="1" />
                        <label for="wpil_keywords_restrict_to_cats">' . __('Restrict autolinks to specific categories?', 'wpil') . '</label>
                        <span class="wpil-keywords-restrict-cats-show"></span>
                    </div>';

                    $cat_selector .= '<ul class="wpil-keywords-restrict-cats" style="display:none;">';
                    $cat_selector .= '<li>' . __('Available Categories:', 'wpil') . '</li>';
                    foreach($terms as $term_data){
                        foreach($term_data as $term){

                            $cat_selector .= '<li>
                                    <input type="hidden" name="wpil_keywords_restrict_term_' . $term->term_id . '" value="0" />
                                    <input type="checkbox" class="wpil-restrict-keywords-input" name="wpil_keywords_restrict_term_' . $term->term_id . '" ' . (in_array($term->term_id, $restricted_cats)?'checked':'') . ' data-term-id="' . $term->term_id . '">' . $term->name . '</li>';
                        }
                    }
                    $cat_selector .= '</ul>';
                    $cat_selector .= '<br />';
                }

                return '<div>' . stripslashes($item->$column_name) . '<i class="dashicons dashicons-admin-generic"></i></div>
                        <div class="local_settings">
                            <div class="block" data-id="' . $item->id . '">
                                <input type="hidden" name="wpil_keywords_add_same_link" value="0" />
                                <input type="checkbox" name="wpil_keywords_add_same_link" ' . ($item->add_same_link==1?'checked':'') . ' value="1" />
                                <label for="wpil_keywords_add_same_link">Add link if post already has this link?</label>
                                <br>
                                <input type="hidden" name="wpil_keywords_link_once" value="0" />
                                <input type="checkbox" name="wpil_keywords_link_once" ' . ($item->link_once==1?'checked':'') . ' value="1" />
                                <label for="wpil_keywords_link_once">Only link once per post</label>
                                <br>
                                ' . $cat_selector . '
                                <a href="javascript:void(0)" class="button-primary wpil_keyword_local_settings_save" data-id="' . $item->id . '">Save</a>
                            </div>
                            <div class="progress_panel loader">
                                <div class="progress_count"></div>
                            </div>
                        </div>';
            case 'link':
                return $item->$column_name;
            case 'links':
                $links = $item->$column_name;
                ob_start();
                include WP_INTERNAL_LINKING_PLUGIN_DIR . '/templates/blocks/collapsible_posts.php';
                return ob_get_clean();
            case 'actions':
                return '<a href="javascript:void(0)" class="delete" data-id="' . $item->id . '">Delete</a>';
            default:
                return print_r($item, true);
        }
    }

    function get_sortable_columns()
    {
        return [
            'keyword' => ['keyword', false],
            'link' => ['link', false],
        ];
    }
}