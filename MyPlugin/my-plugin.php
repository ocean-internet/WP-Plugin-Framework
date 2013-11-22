<?php
/**
 * Name:        MyPlugin
 * Description: DescriptionOfMyPlugin
 */

if(!defined('DS')) {

    define('DS', DIRECTORY_SEPARATOR);
}

if(!defined('OIS_WPPF')) {

    define('OIS_WPPF', TRUE);

    define('OIS_WPPF_DIR',           dirname(__FILE__));
    define('OIS_WPPF_SCRIPTS_DIR',   OIS_WPPF_DIR . DS . 'scripts');
    define('OIS_WPPF_TEMPLATES_DIR', OIS_WPPF_DIR . DS . 'templates');
    define('OIS_WPPF_VENDOR_DIR',    OIS_WPPF_DIR . DS . 'vendor');

    define('OIS_WPPF_FRAMEWORK_DIR', OIS_WPPF_VENDOR_DIR . DS . 'src' . DS . 'ocean-internet' . DS . 'wp-plugin-framework');
}

// Include the Composer autoloader
require_once(OIS_WPPF_VENDOR_DIR . DS . 'autoload.php');

// Include the Framework config
require_once(OIS_WPPF_FRAMEWORK_DIR . DS . 'Config'. DS . 'bootstrap.php');
require_once(OIS_WPPF_FRAMEWORK_DIR . DS . 'Config'. DS . 'functions.php');

// Include the MyPlugin
require_once(OIS_WPPF_SCRIPTS_DIR . DS . 'pluggable.php');
require_once(OIS_WPPF_SCRIPTS_DIR . DS . 'actions.php');
require_once(OIS_WPPF_SCRIPTS_DIR . DS . 'filters.php');
