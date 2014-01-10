<?php
add_shortcode(
    'my-plugin-shortcode',
    array(
        $oisPluginFrameworkC['MyPluginClass'],
        'shortcodeFunction'
    )
);
