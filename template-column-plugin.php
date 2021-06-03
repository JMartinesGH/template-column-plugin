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