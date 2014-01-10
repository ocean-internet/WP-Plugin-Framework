<?php
/**
 * Plugin Name: MU Bower Register
 * Plugin URI:  https://github.com/OceanInternet/WP-Plugin-Framework
 * Description: Register bower scripts/styles
 * Version:     1.0.0
 * Author:      Andy Weir <andy@ocean-internet.co.uk>
 * License:     (GPL-2.0+ or GPL-3.0+)
 */

if(!defined('MUBR_PLUGIN_URL')) {

    define('MUBR_PLUGIN_URL', WPMU_PLUGIN_URL . '/vendor/bower/');
}

add_action(
    'wp_enqueue_scripts',
    'muBowerRegisterScripts'
);

add_action(
    'admin_enqueue_scripts',
    'muBowerRegisterScripts'
);

add_action(
    'login_enqueue_scripts',
    'muBowerRegisterScripts'
);

function muBowerRegisterScripts() {

    wp_register_script(
        'angular',
        MUBR_PLUGIN_URL . 'angular/angular.js',
        array('jquery'),
        NULL,
        TRUE
    );
    wp_register_script(
        'angular-route',
        MUBR_PLUGIN_URL . 'angular-route/angular-route.js',
        array('angular'),
        NULL,
        TRUE
    );
    wp_register_style(
        'angular-css',
        MUBR_PLUGIN_URL . 'augeo-angular/css/angular.css'
    );
    wp_register_script(
        'augeo-angular',
        MUBR_PLUGIN_URL . 'augeo-angular/src/augeo.js',
        array('angular'),
        NULL,
        TRUE
    );
    wp_register_script(
        'augeo-angular-service-message',
        MUBR_PLUGIN_URL . 'augeo-angular/src/services/message.js',
        array('augeo-angular'),
        NULL,
        TRUE
    );
    wp_register_script(
        'augeo-angular-service-db',
        MUBR_PLUGIN_URL . 'augeo-angular/src/services/db.js',
        array('augeo-angular', 'augeo-angular-service-message'),
        NULL,
        TRUE
    );
}
