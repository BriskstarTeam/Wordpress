<?php

if (!class_exists('WP_List_Table')) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Wpil_Table_Report extends WP_List_Table
{

    function __construct()
    {
        parent::__construct(array(
            'singular' => __('Linking Stats', 'wpil'),
            'plural' => __('Linking Stats', 'wpil'),
            'ajax' => false
        ));

        $this->prepare_items();
    }

    function column_default($item, $column_name)
    {
        if ($column_name == 'post_type') {
            return $item['post']->getType();
        }

        if (!array_key_exists($column_name, $item)) {
            return "<i>(not set)</i>";
        }

        $v = $item[$column_name];
        if (!$v) {
            $v = 0;
        }

        $v_num = $v;

        $post_id = $item['post']->id;
        if (in_array($column_name, Wpil_Report::$meta_keys)) {
            $opts = [];
            $opts['target'] = '_blank';
            $opts['style'] = 'text-decoration: underline';

            $opts['data-wpil-report-post-id'] = $post_id;
            $opts['data-wpil-report-type'] = $column_name;
            $opts['data-wpil-report'] = 1;

            $v = "<span class='wpil_ul'>$v</span>";

            switch ($column_name) {
                case WPIL_LINKS_INBOUND_INTERNAL_COUNT:
                    $v = "<div class='inbound-link-count'>&#x2799;";
                    $links_data = $item['post']->getInboundInternalLinks();
                    $title = __('Inbound Internal Links', 'wpil');
                    break;

                case WPIL_LINKS_OUTBOUND_EXTERNAL_COUNT:
                    $v = "&#x279A;";
                    $links_data = $item['post']->getOutboundExternalLinks();
                    $title = __('Outbound External Links', 'wpil');
                    break;

                case WPIL_LINKS_OUTBOUND_INTERNAL_COUNT:
                    $v = "&#x2799;";
                    $links_data = $item['post']->getOutboundInternalLinks();
                    $title = __('Outbound Internal Links', 'wpil');
                    break;
            }


            if ($v_num > 0 || WPIL_LINKS_INBOUND_INTERNAL_COUNT == $column_name) {

            } else {
                $v = "<div title='$title' style='margin:0px; text-align: center; padding: 5px'>0 $v</div>";
            }

            $get_all_links = Wpil_Settings::showAllLinks();

            if ($v_num > 0 || WPIL_LINKS_INBOUND_INTERNAL_COUNT == $column_name) {
                $rep = '';

                if (is_array($links_data)) {
                    $rep .= '<ul class="report_links">';

                    switch ($column_name) {
                        case 'wpil_links_inbound_internal_count':
                            $count = 0;
                            foreach ($links_data as $link) {
                                if (!Wpil_Filter::linksLocation() || $link->location == Wpil_Filter::linksLocation()) {
                                    $count++;
                                    if (!empty($link->post)) {
                                        $rep .= '<li>
                                                    <i class="wpil_link_delete dashicons dashicons-no-alt" data-post_id="'.$link->post->id.'" data-post_type="'.$link->post->type.'" data-anchor="'.base64_encode($link->anchor).'" data-url="'.base64_encode($link->url).'"></i>
                                                    <div>
                                                        <div style="margin: 3px 0;"><b>Post Title:</b> ' . $link->post->getTitle() . '</div>
                                                        <div style="margin: 3px 0;"><b>Anchor Text:</b> ' . strip_tags($link->anchor) . '</div>';
                                        $rep .= ($get_all_links) ? '<div style="margin: 3px 0;"><b>Link Location:</b> ' . $link->location . '</div>' : '';
                                        $rep .=         '<a href="' . admin_url('post.php?post=' . $link->post->id . '&action=edit') . '" target="_blank">[edit]</a> 
                                                        <a href="' . $link->post->getLinks()->view . '" target="_blank">[view]</a>
                                                        <br>
                                                    </div>
                                                </li>';
                                    } else {
                                        $rep .= '<li><div><b>[' . strip_tags($link->anchor) . ']</b><br>[' . $link->location . ']<br><br></div></li>';
                                    }
                                }
                            }
                            $v .= '<span class="wpil_ul">' . $count . '</span></div>' . '<a class="add-internal-links" href="javascript:void(window.open(\''.$item['links_inbound_page_url'].'\'))" style="text-decoration: underline;" data-wpil-report-post-id="1" data-wpil-report-type="wpil_links_inbound_internal_count" data-wpil-report="1">Add</a>';
                            break;
                        case 'wpil_links_outbound_internal_count':
                        case 'wpil_links_outbound_external_count':
                            $count = 0;
                            foreach ($links_data as $link) {
                                if (!Wpil_Filter::linksLocation() || $link->location == Wpil_Filter::linksLocation()) {
                                    $count++;
                                    $rep .= '<li>
                                                <i class="wpil_link_delete dashicons dashicons-no-alt" data-post_id="' . $item['post']->id . '" data-post_type="' . $item['post']->type . '" data-anchor="' . base64_encode($link->anchor) . '" data-url="' . base64_encode($link->url) . '"></i>
                                                <div>
                                                    <div style="margin: 3px 0;"><b>Link:</b> <a href="' . $link->url . '" target="_blank" style="text-decoration: underline">' . $link->url . '</a></div>
                                                    <div style="margin: 3px 0;"><b>Anchor Text:</b> ' . strip_tags($link->anchor) . '</div>';
                                    $rep .= ($get_all_links) ? '<div style="margin: 3px 0;"><b>Link Location:</b> ' . $link->location . '</div>' : '';
                                    $rep .=     '</div>
                                            </li>';
                                }
                            }
                            $v = '<span class="wpil_ul">' . $count . '</span> ' . $v;
                            break;
                    }

                    $rep .= '</ul>';
                }

                $e_rt = esc_attr($column_name);
                $e_p_id = esc_attr($post_id);

                $v = "<div class='wpil-collapsible-wrapper'>
  			            <div class='wpil-collapsible wpil-collapsible-static wpil-links-count' title='$title' data-wpil-report-type='$e_rt' data-wpil-report-post-id='$e_p_id' >$v</div>
  				        <div class='wpil-content'>
          			        $rep
  				        </div>
  				    </div>";
            }

        }

        return $v;
    }

    function get_columns()
    {
        $columns = ['post_title' => __('Title', 'wpil')];
        $options = get_user_meta(get_current_user_id(), 'report_options', true);
        if (!empty($options['show_type']) && $options['show_type'] == 'on') {
            $columns['post_type'] = __('Type', 'wpil');
        }

        $columns = array_merge($columns, [
            WPIL_LINKS_INBOUND_INTERNAL_COUNT => __('Inbound internal links', 'wpil'),
            WPIL_LINKS_OUTBOUND_INTERNAL_COUNT => __('Outbound internal links', 'wpil'),
            WPIL_LINKS_OUTBOUND_EXTERNAL_COUNT => __('Outbound external links', 'wpil'),
        ]);

        if (!empty($options['show_date']) && $options['show_date'] == 'on') {
            $columns['date'] = __('Published', 'wpil');
        }

        return $columns;
    }

    function column_post_title($item)
    {
        $post = $item['post'];

        $actions = [];

        $title = '<a href="' . $post->getLinks()->edit . '" class="row-title">' . esc_attr($post->getTitle()) . '</a>';
        $actions['view'] = '<a target=_blank  href="' . $post->getLinks()->view . '">View</a>';
        $actions['edit'] = '<a target=_blank href="' . $post->getLinks()->edit . '">Edit / Add outbound links</a>';
        $actions['export'] = '<a target=_blank href="' . $post->getLinks()->export . '">Export data</a>';
        $actions['excel_export'] = '<a target=_blank href="' . $post->getLinks()->excel_export . '">Export to Excel</a>';
        $actions['refresh'] = '<a href="' . $post->getLinks()->refresh . '">Refresh links count</a>';

        if(isset($_GET['orphaned'])){
            $actions['ignore-orphaned'] = '<a href="#" class="wpil-ignore-orphaned-post" data-post-id="' . $post->id . '" data-type="' . $post->type . '" data-nonce="'. wp_create_nonce('ignore-orphaned-post-' . $post->id) .'">Ignore orphaned post</a>';
        }

        return $title . $this->row_actions($actions);
    }


    function get_sortable_columns()
    {
        $cols = $this->get_columns();

        $sortable_columns = [];

        foreach ($cols as $col_k => $col_name) {
            $sortable_columns[$col_k] = [$col_k, false];
        }

        return $sortable_columns;
    }

    function prepare_items()
    {
        $options = get_user_meta(get_current_user_id(), 'report_options', true);
        $per_page = !empty($options['per_page']) ? $options['per_page'] : 20;

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = array($columns, $hidden, $sortable);

        $start = isset($_REQUEST['paged']) ? (int)$_REQUEST['paged'] : 0;
        $orderby = (isset($_REQUEST['orderby']) && !empty($_REQUEST['orderby'])) ? sanitize_text_field($_REQUEST['orderby']) : '';
        $order = (!empty($_REQUEST['order'])) ? sanitize_text_field($_REQUEST['order']) : 'DESC';
        $search = (!empty($_REQUEST['s'])) ? sanitize_text_field($_REQUEST['s']) : '';
        $orphaned = !empty($_REQUEST['orphaned']);

        if (empty($orderby)) {
            $saved_order = get_transient('wpil_link_report_order');
            if (!empty($saved_order)) {
                $saved_order = explode(';', $saved_order);
                if (count($saved_order) == 2) {
                    $orderby = !empty($saved_order[0]) ? $saved_order[0] : '';
                    $order = !empty($saved_order[1]) ? $saved_order[1] : 'DESC';
                }
            }
        }

        if (!empty($orderby)) {
            set_transient('wpil_link_report_order', $orderby . ';' . $order);
        }

        $data = Wpil_Report::getData($start, $orderby, $order, $search, $limit = $per_page, $orphaned);

        $total_items = $data['total_items'];
        $data = $data['data'];

        $this->items = $data;

        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));
    }

    /**
     * Displays the search box.
     *
     * @param string $text     The 'submit' button label.
     * @param string $input_id ID attribute value for the search input field.
     */
    public function search_box( $text, $input_id ) {
        if ( empty( $_REQUEST['s'] ) && ! $this->has_items() ) {
            return;
        }

        $input_id = $input_id . '-search-input';

        if ( ! empty( $_REQUEST['orderby'] ) ) {
            echo '<input type="hidden" name="orderby" value="' . esc_attr( $_REQUEST['orderby'] ) . '" />';
        }
        if ( ! empty( $_REQUEST['order'] ) ) {
            echo '<input type="hidden" name="order" value="' . esc_attr( $_REQUEST['order'] ) . '" />';
        }
        if ( ! empty( $_REQUEST['post_mime_type'] ) ) {
            echo '<input type="hidden" name="post_mime_type" value="' . esc_attr( $_REQUEST['post_mime_type'] ) . '" />';
        }
        if ( ! empty( $_REQUEST['detached'] ) ) {
            echo '<input type="hidden" name="detached" value="' . esc_attr( $_REQUEST['detached'] ) . '" />';
        }
        ?>
        <p class="search-box">
            <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo $text; ?>:</label>
            <input type="search" id="<?php echo esc_attr( $input_id ); ?>" name="s" value="<?php _admin_search_query(); ?>" placeholder="Keyword or URL" />
            <?php submit_button( $text, '', '', false, array( 'id' => 'search-submit' ) ); ?>
        </p>
        <?php
    }

    function extra_tablenav( $which ) {
        if ($which == "top") {
            $post_type = !empty($_GET['post_type']) ? $_GET['post_type'] : 0;
            $cat = !empty($_GET['category']) ? $_GET['category'] : 0;
            $location = !empty($_GET['location']) ? $_GET['location'] : null;
            ?>
            <div class="alignright actions bulkactions" id="wpil_links_table_filter">
                <select name="post_type">
                    <option value="0">All types</option>
                    <?php foreach (Wpil_Settings::getAllTypes() as $type) : ?>
                        <option value="<?=$type?>" <?=$type===$post_type?' selected':''?>><?=ucfirst($type)?></option>
                    <?php endforeach; ?>
                </select>
                <select name="category">
                    <option value="0">All categories</option>
                    <?php foreach (get_categories() as $category) : ?>
                        <option value="<?=$category->cat_ID?>" <?=$category->cat_ID===(int)$cat?' selected':''?>><?=$category->name?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (Wpil_Settings::showAllLinks()) : ?>
                    <select name="location">
                        <option value="0">All locations</option>
                        <?php foreach (['header', 'content', 'footer'] as $loc) : ?>
                            <option value="<?=$loc?>" <?=$loc==$location?' selected':''?>><?=$loc?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
                <span class="button-primary">Filter</span>
            </div>
            <?php
        }
    }
}
