<?php

// Settings Menu
add_action(
    'admin_menu',
    array(
        $oisPluginFrameworkC['MyPluginSettings'],
        'addPluginSettings'
    )
);

add_action(
    'wp_enqueue_scripts',
    function () {

        myPluginRegisterScripts();
    }
);

add_action(
    'admin_enqueue_scripts',
    function () {

        myPluginRegisterScripts();
    }
);

add_action(
    'login_enqueue_scripts',
    function () {

        myPluginRegisterScripts();
    }
);

