<?php
/**
 * Description of PluginTemplate
 *
 * @author andy
 */
class PluginTemplate {
    
    protected $title = 'Plugin Template';
    protected $slug  = 'plugin-template';

    protected $options = array(
        'option_a',
        'option_b',
        'option_c'
    );


    public function __construct() {
    }
    
    public function addOptionsMenu() {
        
        add_options_page(
            $this->title . ' Options',
            $this->title,
            'manage_options',
            $this->slug . '-options',
            array(
                $this,
                'displayOptionsMenu'
            )
        );
        add_action(
            'admin_init',
            array(
                $this,
                'registerOptions'
            )
        );
    }
    
    public function registerOptions() {
        
        $values = get_option($this->slug . '-options');
        
        register_setting( 
            $this->slug . '-options',
            $this->slug . '-options'
        );
        
        add_settings_section(
            $this->slug . '-options-main',
            $this->title . ' Options',
            array(
                $this,
                'printSectionInfo'
            ),
            $this->slug . '-options');
        
        foreach($this->options as $option) {
            
            add_settings_field(
                $option,
                $this->underscoreToHuman($option), 
                array(
                    $this,
                    'id_number_callback'
                ),
                $this->slug . '-options',
                $this->slug . '-options-main',
                array($option, $values[$option])
            );
        }
    }

    public function printSectionInfo() {
        echo $this->title . ' main settings:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback($option) {
        printf(
            '<input type="text" id="'. $option[0] . '" name="' . $this->slug . '-options[' . $option[0] . ']" value="%s" />',
            esc_attr($option[1])
        );
    }
    
    public function displayOptionsMenu() {
        
        if (!current_user_can('manage_options')) {
            wp_die( __('You do not have sufficient permissions to access this page.'));
	}
?>	
<div class="wrap">
    <?php screen_icon(); ?>
    <h2><?php echo $this->title; ?> Options</h2>
    <form method="post" action="options.php">
        <?php settings_fields($this->slug . '-options'); ?>
        <?php do_settings_sections($this->slug . '-options'); ?>
        <?php submit_button(); ?>
    </form>
</div>
<?php
    }
    
    protected function underscoreToHuman($underscore) {
        
        $array = explode('_', $underscore);
        
        return ucwords(implode(' ', $array));
    }
}