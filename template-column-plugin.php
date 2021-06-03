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
function template_name_pages_column($columns){
    #adds Template Name as 'template-name'
    $columns['template-name'] = __('Template Name', 'template-name');
    return $columns;
}

add_action('manage_pages_custom_column', 'template_name_column', 10,2);
function template_name_column($column_name, $id){
    if ( 'template-name' === $column_name ) {
        echo get_post_meta( $id, '_wp_page_template', true );
    }
}