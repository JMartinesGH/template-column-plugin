<?php
/**
 * Plugin Name: Template Column Plugin
 * Plugin URI: https://github.com/JMartinesGH/template-column-plugin
 * Description: Plugin that adds page template column to the pages view in WP-Admin
 * Author: Jamie Martines
 * Version: 0.0.1
 */

 # create Template Name column on pages view
add_filter('manage_pages_columns', 'template_name_pages_column');
function template_name_pages_column( $columns ){
    #adds Template Name as 'template-name'
    $columns['template-name'] = __('Template Name', 'template-name');
    return $columns;
}

# add template name to column for each page
add_action('manage_pages_custom_column', 'template_name_column', 10,2);
function template_name_column( $column_name, $id ){
    # if column template name exists
    if ( 'template-name' === $column_name ) {
        // echo get_post_meta( $id, '_wp_page_template', true );
        $template_data = get_post_meta( $id, '_wp_page_template', true );
        if ( 'default' == $template_data ) {
            # echo the default page template name
            echo __('Default Template', 'template-name');
        }
        # get all templates available in theme
        $templates = get_page_templates();
        # loop through the keys in templates array
        foreach ( array_keys( $templates ) as $template ) {
            # if template data matches templates[template] return template name
            if ( $template_data == $templates[$template] ) echo $template;
        }
    }
}

# add template name column to list of sortable columns
add_filter('manage_edit-page_sortable_columns', 'template_name_sortable_columns');
function template_name_sortable_columns( $columns ){
    $columns['template-name'] = 'template-name';
    return $columns;
}

# add dropdown of templates
add_action('restrict_manage_posts', 'template_name_dropdown');
function template_name_dropdown( $post_type ){
    if( 'page' !== $post_type) return;
    $selected = $_GET['template_name_filter'];
?>
    <select name="template_name_filter" id="template_name_filter">
        <option value="all" <?php echo ($selected == 'all')? 'selected': ''; ?>>All Templates</option>
        <option value="default" <?php echo ($selected == 'default')?  'selected': ''; ?>>Default</option>
        <?php # prints out options for all templates
        page_template_dropdown($selected); ?>
    </select>
<?php
}

# filter based on selected template-name
add_filter('pre_get_posts', 'template_name_filter_pages');
function template_name_filter_pages( $query ){
    global $pagenow;
    if( 'edit.php' == $pagenow ){
        if(isset($_GET['template_name_filter'])){
            # selected template slug
            $selected = $_GET['template_name_filter'];
            if ('all' !== $selected){
                // var_dump($selected);
                #arguments for meta query? 
                $query->set('meta_key', '_wp_page_template');
                $query->set('meta_value', $selected);
            }
        }else{
            // nothing to see here
        }
    }
}
