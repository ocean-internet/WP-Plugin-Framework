<?php
namespace OIS\WpPluginFramework;

class Settings extends Core {
    /* Properties: Dependencies --------------------------------------------- */

    protected $pluginDir;

    /* Properties: Public --------------------------------------------------- */

    /* Properties: Protected/Private ---------------------------------------- */

    protected $defaultSettingOptions = array(
        'valid' => '\OIS\PluginTemplate\notEmpty',
        'clean' => 'text_field',
        'input' => 'text'
    );

    protected $settings = array(
        'title',
        'comment' => array(
            'clean' => 'text_field'
        ),
        'email_address' => array(
            'valid'  => 'is_email',
            'clean'  => 'text_field',
            'input'  => 'email'
        )
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
            toSlug($this->getFullName()),
            array($this, 'validate')
        );

        add_settings_section(toSlug($this->getFullName()) . '-main',
            toHuman($this->getFullName()),
            array(
                $this,
                'printSectionInfo'
            ),
            toSlug($this->getFullName()));

        foreach($this->settings as $setting => $options) {

            if(is_int($setting)) {

                $setting = $options;
                $options = $this->defaultSettingOptions;

            } else {

                $options = array_merge($this->defaultSettingOptions, $options);
            }

            if(array_key_exists($setting, $values)) {

                $value = $values[$setting];

            } else {

                $value = NULL;
            }

            add_settings_field(
                $setting,
                toHuman($setting),
                array(
                    $this,
                    'print' . ucfirst($options['input']) . 'Setting'
                ),
                toSlug($this->getFullName()),
                toSlug($this->getFullName()) . '-main',
                array($setting, $value)
            );
        }
    }

    public function validate($pluginSettings) {

        foreach($pluginSettings as $setting => $value) {

            if(!array_key_exists($setting, $this->settings) && !in_array($setting, $this->settings)) {

                add_settings_error(toSlug($this->getFullName()), 'invalid-' . $setting, toHuman($setting) . ' does not exist.');
                unset($pluginSettings[$setting]);
                continue;

            } elseif(array_key_exists($setting, $this->settings)) {

                $options = array_merge($this->defaultSettingOptions, $this->settings[$setting]);

            } else {

                $options = $this->defaultSettingOptions;
            }

            $clean = 'sanitize_' . $options['clean'];

            $value = $clean($value);

            if($options['valid']($value)) {

                $pluginSettings[$setting] = $value;

            } else {

                add_settings_error(toSlug($this->getFullName()), 'invalid-' . $setting, toHuman($setting) . ' is not valid.');
            }
        }

        return $pluginSettings;
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

    public function printTextSetting($setting) {

        $input = '<input type="text" id="'. $setting[0] . '" name="' . toSlug($this->getFullName()) . '[' . $setting[0] . ']" value="%s" />';

        printf(
            $input,
            esc_attr($setting[1])
        );
    }

    public function printEmailSetting($setting) {

        $input = '<input type="email" id="'. $setting[0] . '" name="' . toSlug($this->getFullName()) . '[' . $setting[0] . ']" value="%s" />';

        printf(
            $input,
            esc_attr($setting[1])
        );
    }


    /* Methods: Protected/Private ------------------------------------------- */

    /* ---------------------------------------------------------------------- */
}
