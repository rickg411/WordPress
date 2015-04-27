<?php
/*
Plugin Name:  Must Use Plugins Loader
Plugin URI:   http://benword.com/
Description:  Options Framework, CMB, and site-specific functionality (custom post types, taxonomies, meta boxes, shortcodes)
Version:      1.0
Author:       Ingreidents Design
*/

// Disables Plugins for production Enviroment
if ( defined( 'WP_LOCAL_DEV' ) || !WP_LOCAL_DEV ) {

}

// if ( file_exists( dirname( __FILE__ ) . '/advanced-custom-fields/acf.php' ) ) require WPMU_PLUGIN_DIR . '/advanced-custom-fields/acf.php';

if ( file_exists( dirname( __FILE__ ) . '/json-api/json-api.php' ) ) require WPMU_PLUGIN_DIR . '/json-api/json-api.php';

// if ( file_exists( get_template_directory() . '/options.php' ) ) require WPMU_PLUGIN_DIR . '/options-framework/options-framework.php';

// Required at all Times
// require WPMU_PLUGIN_DIR . '/register-theme-directory.php';

// Site specific custom post types, taxonomies, meta boxes and shortcodes
if( WP_LOCAL_DEV && file_exists( dirname( __FILE__ ) . '/lib/base/base.php' ) ) {
	require get_template_directory() . '/lib/base/base.php';
} else {
	require WPMU_PLUGIN_DIR . '/base/base.php';
}

// Load CMB
function load_cmb() {
  if (!is_admin()) {
    return;
  }
  
  require WPMU_PLUGIN_DIR . '/cmb/init.php';
}
 add_action('init', 'load_cmb');
