<?php
/*
    Plugin Name: Relative Menu Items
    Plugin URI: https://github.com/enscope/wp-relative-menu-items
    Description: Allows to include relative ROOT in menu items.
    Version: 1.0
    Author: Miroslav Hudak (enscope, s.r.o.)
    Author URI: http://www.enscope.com
*/

add_filter('wp_nav_menu_items', function($items, $args) {
    // trim trailing slash and consider multi-site setup
    $rootUrl = rtrim(is_multisite() ? network_site_url() : home_url(), '/');
    return preg_replace('/https?:\/\/%ROOT%/i', $rootUrl, $items);
}, 10, 2);
