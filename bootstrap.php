<?php
namespace OIS;

$oisPluginTemplateC = new Vendor\Pimple();

// Make global $wpdb injectable
$oisPluginTemplateC['wpdb'] = $oisPluginTemplateC->share(function () {
    
    global $wpdb;
    
    return $wpdb;
});

$oisPluginTemplateC['pluginDir'] = dirname(__FILE__);

$oisPluginTemplateC['Settings'] = $oisPluginTemplateC->share(function ($c) {
    
    return new PluginTemplate\Settings($c['pluginDir']);
});
