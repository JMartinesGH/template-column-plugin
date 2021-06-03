<?php
/**
 * Plugin Name: Template Column Plugin
 * Plugin URI: https://github.com/JMartinesGH/template-column-plugin
 * Description: Plugin that adds page template column to the pages view in WP-Admin
 * Author: Jamie Martines
 * Version: 0.0.1
 */

add_filter('manage_pages_columns', 'template_name_pages_column');
function template_name_pages_column($columns){
    $columns['template-name'] = __('Template Name');
    return $columns;
}