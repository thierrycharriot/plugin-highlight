<?php
/**
 * Plugin Name:     Plugin Highlight
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     plugin-highlight
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Plugin_Highlight
 */

// Your code starts here.


# https://developer.wordpress.org/reference/functions/plugin_dir_url/
# plugin_dir_url( string $file )
# Get the URL directory path (with trailing slash) for the plugin __FILE__ passed in.
define( 'PLUGIN_HIGHLIGHT_URL', plugin_dir_url( __FILE__ ) );
# https://developer.wordpress.org/reference/functions/plugin_dir_path/
# plugin_dir_path( string $file )
# Get the filesystem directory path (with trailing slash) for the plugin __FILE__ passed in.
define( 'PLUGIN_HIGHLIGHT_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Add highlight.js
 *
 * @return void
 */
function plugin_enqueue_highlight () {
    # https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    # wp_enqueue_style( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' )
    # Enqueue a CSS stylesheet.
    wp_enqueue_style('highlight-css', PLUGIN_HIGHLIGHT_URL . 'highlight/styles/rainbow.min.css', []); 

    # https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
    # do_action( 'wp_enqueue_scripts' )
    # Fires when scripts and styles are enqueued.
    wp_enqueue_script('highlight-js', PLUGIN_HIGHLIGHT_URL . 'highlight/highlight.min.js', [], false, true);

    wp_add_inline_script( 'highlight-js', 'hljs.highlightAll();', 'after' );
}
add_action( 'wp_enqueue_scripts', 'plugin_enqueue_highlight');

### Fin
