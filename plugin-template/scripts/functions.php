<?php
function myPluginRegisterScripts() {

    wp_register_script(
        'my-plugin-angular',
        MY_PLUGIN_URL . 'angular/MyPlugin.js',
        array('angular', 'angular-route')
    );
}
