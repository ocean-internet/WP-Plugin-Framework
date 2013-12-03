<?php
/**
 * Name:        PluginTemplate
 * Description: DescriptionOfPluginTemplate
 */

if(!defined('PLUGIN_TEMPLATE')) {

    define('PLUGIN_TEMPLATE', TRUE);

    define('PLUGIN_TEMPLATE_DIR',           dirname(__FILE__));
    define('PLUGIN_TEMPLATE_SCRIPTS_DIR',   PLUGIN_TEMPLATE_DIR . DS . 'scripts');
    define('PLUGIN_TEMPLATE_TEMPLATES_DIR', PLUGIN_TEMPLATE_DIR . DS . 'templates');
}

$oisPluginFrameworkC['pluginTemplateDir']     = PLUGIN_TEMPLATE_DIR;

$oisPluginTemplateC['PluginTemplateSettings'] = $oisPluginFrameworkC->share(function ($c) {

    return new \UKNetWeb\PluginTemplate\Settings($c['pluginTemplateDir']);
});

// Include the MyPlugin
require_once(PLUGIN_TEMPLATE_SCRIPTS_DIR . DS . 'pluggable.php');
require_once(PLUGIN_TEMPLATE_SCRIPTS_DIR . DS . 'actions.php');
require_once(PLUGIN_TEMPLATE_SCRIPTS_DIR . DS . 'filters.php');
