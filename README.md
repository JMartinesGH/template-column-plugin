# template-column-plugin
[Import WP Functions and Hooks](#Important-WP-functions-and-hooks)


## About
WP Plugin that adds page template column to the pages view in WP-Admin

## Installation

1. Clone the git repository into your plugins directory
2. Activate the plugin in `/wp-admin/plugins.php`

## Important WP functions and hooks 

### manage_pages_columns
Filters the columns displayed in the Pages list table
[View](https://developer.wordpress.org/reference/hooks/manage_pages_columns/)

### manage_pages_custom_column
Fires in each custom column on the Pages list table
[View](https://developer.wordpress.org/reference/hooks/manage_pages_custom_column/)

### get_page_templates
Gets the page templates available in this theme
[View](https://developer.wordpress.org/reference/functions/get_page_templates/)

### manage_edit-page_sortable_columns
Filters the list table sortable columns for a specific screen
[View](https://developer.wordpress.org/reference/hooks/manage_this-screen-id_sortable_columns/)


### page_template_dropdown
Print out option HTML elements for the page templates drop-down
[View](https://developer.wordpress.org/reference/functions/page_template_dropdown/)

### pre_get_posts
Fires after the query variable object is created, but before the actual query is run
[View](https://developer.wordpress.org/reference/hooks/pre_get_posts/)