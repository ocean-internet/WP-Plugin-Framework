<?php
namespace OIS\PluginTemplate;

class Settings extends Core {
    /* Properties: Dependencies --------------------------------------------- */

    protected $pluginDir;

    /* Properties: Public --------------------------------------------------- */

    /* Properties: Protected/Private ---------------------------------------- */

    protected $settings = array(
        'option_a',
        'option_b',
        'option_c'
    );
    
    /* Methods: Constructor ------------------------------------------------- */

    public function __construct($pluginDir) {
        
        $this->pluginDir = $pluginDir;
    }

    /* Methods: Getter/Setter ----------------------------------------------- */

    /* Methods: Public ------------------------------------------------------ */

    public function addPluginSettings() {
        
        add_options_page(
            toHuman($this->getFullName()),
            toHuman($this->getName()),
            'manage_options',
            toSlug($this->getFullName()),
            array(
                $this,
                'displaySettingsMenu'
            )
        );
        add_action(
            'admin_init',
            array(
                $this,
                'registerSettings'
            )
        );
    }
    
    public function registerSettings() {
        
        $values = get_option(toSlug($this->getFullName()));
        
        register_setting( 
            toSlug($this->getFullName()),
            toSlug($this->getFullName())
        );
        
        add_settings_section(toSlug($this->getFullName()) . '-main',
            toHuman($this->getFullName()),
            array(
                $this,
                'printSectionInfo'
            ),
            toSlug($this->getFullName()));
        
        foreach($this->settings as $setting) {
            
            add_settings_field(
                $setting,
                toHuman($setting), 
                array(
                    $this,
                    'id_number_callback'
                ),
                toSlug($this->getFullName()),
                toSlug($this->getFullName()) . '-main',
                array($setting, $values[$setting])
            );
        }
    }
    
    public function displaySettingsMenu() {
        
        if (!current_user_can('manage_options')) {
            wp_die( __('You do not have sufficient permissions to access this page.'));
	}
        
        $name = $this->getFullName();
        
        $human = toHuman($name);
        $slug  = toSlug($name);
        
        $templateFile = toSlug($this->getFullName()) . '.php';
        
        if ($overridden_template = locate_template($templateFile)) {

            // locate_template() returns path to file
            // if either the child theme or the parent theme have overridden the template
            include $overridden_template;
        } else {

            // If neither the child nor parent theme have overridden the template,
            // we load the template from the 'templates' sub-directory of the directory this file is in
            include $this->pluginDir . '/templates/' . $templateFile;
        }
    }
    
    public function printSectionInfo() {
        echo 'Main ' . toHuman($this->getFullName()) . ':';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback($setting) {
        printf(
            '<input type="text" id="'. $setting[0] . '" name="' . toSlug($this->getFullName()) . '[' . $setting[0] . ']" value="%s" />',
            esc_attr($setting[1])
        );
    }
    
    /* Methods: Protected/Private ------------------------------------------- */
    
    /* ---------------------------------------------------------------------- */
}