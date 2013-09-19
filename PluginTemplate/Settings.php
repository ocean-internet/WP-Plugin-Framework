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
            $this->getName() . ' Settings',
            toHuman($this->getName()),
            'manage_options',
            toSlug($this->getName()) . '-settings',
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
        
        $values = get_option(toSlug($this->getName()) . '-settings');
        
        register_setting( 
            toSlug($this->getName()) . '-settings',
            toSlug($this->getName()) . '-settings'
        );
        
        add_settings_section(toSlug($this->getName()) . '-settings-main',
            toHuman($this->getName()) . ' Settings',
            array(
                $this,
                'printSectionInfo'
            ),
            toSlug($this->getName()) . '-settings');
        
        foreach($this->settings as $setting) {
            
            add_settings_field(
                $setting,
                toHuman($setting), 
                array(
                    $this,
                    'id_number_callback'
                ),
                toSlug($this->getName()) . '-settings',
                toSlug($this->getName()) . '-settings-main',
                array($setting, $values[$setting])
            );
        }
    }
    
    public function displaySettingsMenu() {
        
        if (!current_user_can('manage_options')) {
            wp_die( __('You do not have sufficient permissions to access this page.'));
	}
        
        $name = $this->getName();
        
        $human = toHuman($name);
        $slug  = toSlug($name);
?>	
<div class="wrap">
    <?php screen_icon(); ?>
    <h2><?php echo $human; ?> Settings</h2>
    <form method="post" action="options.php">
        <?php settings_fields($slug . '-settings'); ?>
        <?php do_settings_sections($slug . '-settings'); ?>
        <?php submit_button(); ?>
    </form>
</div>
<?php
    }
    
    public function printSectionInfo() {
        echo toHuman($this->getName()) . ' main settings:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback($setting) {
        printf(
            '<input type="text" id="'. $setting[0] . '" name="' . toSlug($this->getName()) . '-settings[' . $setting[0] . ']" value="%s" />',
            esc_attr($setting[1])
        );
    }
    
    /* Methods: Protected/Private ------------------------------------------- */
    
    /* ---------------------------------------------------------------------- */
}