<?php
/**
 * Plugin Name: MyPluginName
 */

if (!defined('MY_PLUGIN')) {

    define('MY_PLUGIN', TRUE);

    define('MY_PLUGIN_DIR',           dirname(__FILE__));
    define('MY_PLUGIN_URL', plugins_url('my-plugin' , dirname( __FILE__ )) . '/');
    define('MY_PLUGIN_SCRIPTS_DIR',   MY_PLUGIN_DIR . DS . 'scripts');
    define('MY_PLUGIN_TEMPLATES_DIR', MY_PLUGIN_DIR . DS . 'templates');
}

require_once MY_PLUGIN_DIR . DS . 'src' . DS . 'autoload.php';

if(isset($oisPluginFrameworkC)) {

    $oisPluginFrameworkC['MyPluginDir']          = MY_PLUGIN_DIR;
    $oisPluginFrameworkC['MyPluginScriptsDir']   = MY_PLUGIN_SCRIPTS_DIR;

    $oisPluginFrameworkC['MyPluginSettings']     = $oisPluginFrameworkC->share(function ($c) {

        return new MyVendor\MyPlugin\Settings;
    });

    require_once(MY_PLUGIN_SCRIPTS_DIR . DS . 'functions.php');

    require_once(MY_PLUGIN_SCRIPTS_DIR . DS . 'actions.php');
    require_once(MY_PLUGIN_SCRIPTS_DIR . DS . 'ajax.php');
    require_once(MY_PLUGIN_SCRIPTS_DIR . DS . 'filters.php');
    require_once(MY_PLUGIN_SCRIPTS_DIR . DS . 'pluggable.php');
    require_once(MY_PLUGIN_SCRIPTS_DIR . DS . 'filters.php');
    require_once(MY_PLUGIN_SCRIPTS_DIR . DS . 'shortcodes.php');
}
