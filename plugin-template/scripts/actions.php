<?php

// Settings Menu
add_action(
    'admin_menu',
    array(
        $oisPluginFrameworkC['MyPluginSettings'],
        'addPluginSettings'
    )
);
