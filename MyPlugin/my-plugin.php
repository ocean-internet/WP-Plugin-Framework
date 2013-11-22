<?php
/**
 * MyPlugin Name: MyPlugin
 * Description: Description of MyPlugin
 */

$oisSrcDir       = plugin_dir_path(__FILE__ ) . 'src' . DS;
$oisFrameworkDir = $oisSrcDir . 'WpPluginFramework' . DS;
$oisPluginDir    = $oisSrcDir . 'MyPlugin' . DS;

// Include the Composer autoloader
require_once($oisSrcDir . 'Vendor' . DS . 'autoload.php');

// Include the Framework bootstrap
require_once($oisFrameworkDir . 'Config' . DS . 'bootstrap.php');

// Include the Framework functions
require_once($oisPluginFrameworkDir . 'Config' . DS . 'functions.php');

// Include the MyPlugin
require_once($oisPluginDir . 'Config' . DS . 'pluggable.php');
require_once($oisPluginDir . 'Config' . DS . 'actions.php');
require_once($oisPluginDir . 'Config' . DS . 'filters.php');
