<?php

/* 
Plugin Name: Remove comments
Description: Plugin removes comments from admin
Author: Tomas Macek
Version: 1.0
Author URI: https://www.tomasmacek.eu
*/

/* Code from here https://wordpress.stackexchange.com/questions/11222/is-there-any-way-to-remove-comments-function-and-section-totally */

function completelyRemoveCommentsFromAdmin()
{
    // Removes from admin menu
    add_action('admin_menu', 'my_remove_admin_menus');
    function my_remove_admin_menus()
    {
        remove_menu_page('edit-comments.php');
    }
    // Removes from post and pages
    add_action('init', 'remove_comment_support', 100);

    function remove_comment_support()
    {
        remove_post_type_support('post', 'comments');
        remove_post_type_support('page', 'comments');
    }
    // Removes from admin bar
    function mytheme_admin_bar_render()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');
}

completelyRemoveCommentsFromAdmin();
