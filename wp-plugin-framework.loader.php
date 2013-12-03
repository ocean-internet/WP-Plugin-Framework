<?php
/**
 * Plugin Name: OIS WP Plugin Framework Loader
 * Description: Loads in OIS WP Plugin Framework
 * Author:      Andy Weir
 */

if(!defined('DS')) {

    define('DS', DIRECTORY_SEPARATOR);
}

if(!defined('OIS_WPPF_DIR')) {

    define('OIS_WPPF_DIR', WPMU_PLUGIN_DIR . DS . 'vendor' . DS . 'ocean-internet' . DS . 'wp-plugin-framework');
}

require OIS_WPPF_DIR . DS . 'wp-plugin-framework.php';
