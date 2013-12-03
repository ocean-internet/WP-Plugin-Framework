<?php
/**
 * Load wp_plugin_framework functions
 */
require OIS_WPPF_DIR . DS . 'oisFunctions.php';

/**
 * Create Pimple Dependency Container
 */
$oisPluginFrameworkC = new Pimple;

/**
 * Make global $wpdb injectable
 */
$oisPluginFrameworkC['wpdb'] = $oisPluginFrameworkC->share(function () {

    global $wpdb;

    return $wpdb;
});
