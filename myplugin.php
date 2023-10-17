<?php
/*
Plugin Name: Add pages to website
Description: This plugin adds specific pages to the website
Version: 1.0
Author: Ana Maria Rangel

*/

// Function to create pages when the plugin is activated
function add_pages_when_activate() {
   // Array with the names of the pages to be added
    $pages = array(
            //place the list of page names here as shown in the example:
                'Home',
                'Quem Somos',
                'Fale Conosco'    
   
    );

    // Array loop and create pages
    foreach ($pages as $page) {
        // Verify if page exists
        $page_existent = get_page_by_title($page);

        // If the page doesn't exist, it creates the page
        if (!$page_existent) {
            $new_page = array(
                'post_title' => $page,
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page'
            );

            wp_insert_post($new_page);
        }
    }
}

// Hook that executes the function when plugin is activated
register_activation_hook(__FILE__, 'add_pages_when_activate');
