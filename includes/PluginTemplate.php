<?php
/**
 * Description of PluginTemplate
 *
 * @author andy
 */
class PluginTemplate {
    
    public function __construct() {
    }
    
    public function addOptionsMenu() {
        
        add_options_page(
            'Plugin Template Options',
            'Plugin Template',
            'manage_options',
            'plugin-template-options',
            array(
                $this,
                'displayOptionsMenu'
            )
        );
    }
    
    public function displayOptionsMenu() {
        
        if (!current_user_can('manage_options')) {
            wp_die( __('You do not have sufficient permissions to access this page.'));
	}
	
        echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
    }
}