<?php
namespace OceanInternet\WpPluginFramework;

abstract class Settings extends Core {
    /* Properties: Dependencies --------------------------------------------- */

    /* Properties: Public --------------------------------------------------- */

    /* Properties: Protected/Private ---------------------------------------- */

    protected $templateFile          = 'wp-plugin-framework-settings.php';

    protected $defaultSettingOptions = array(
        'valid' => 'oisNotEmpty',
        'clean' => 'text_field',
        'input' => 'text'
    );

    protected $settings = array();

    /* Methods: Constructor ------------------------------------------------- */

    /* Methods: Getter/Setter ----------------------------------------------- */

    /* Methods: Public ------------------------------------------------------ */

    public function addPluginSettings() {

        add_options_page(
            oisToHuman($this->getFullName()),
            oisToHuman($this->getName()),
            'manage_options',
            oisToSlug($this->getFullName()),
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

        $values = get_option(oisToSlug($this->getFullName()));

        register_setting(
            oisToSlug($this->getFullName()),
            oisToSlug($this->getFullName()),
            array($this, 'validate')
        );

        add_settings_section(oisToSlug($this->getFullName()) . '-main',
            oisToHuman($this->getFullName()),
            array(
                $this,
                'printSectionInfo'
            ),
            oisToSlug($this->getFullName()));

        foreach($this->settings as $setting => $options) {

            if(is_int($setting)) {

                $setting = $options;
                $options = $this->defaultSettingOptions;

            } else {

                $options = array_merge($this->defaultSettingOptions, $options);
            }

            if($values && array_key_exists($setting, $values)) {

                $value = $values[$setting];

            } else {

                $value = NULL;
            }

            add_settings_field(
                $setting,
                oisToHuman($setting),
                array(
                    $this,
                    'print' . ucfirst($options['input']) . 'Setting'
                ),
                oisToSlug($this->getFullName()),
                oisToSlug($this->getFullName()) . '-main',
                array($setting, $value)
            );
        }
    }

    public function validate($pluginSettings) {

        foreach($pluginSettings as $setting => $value) {

            if(!array_key_exists($setting, $this->settings) && !in_array($setting, $this->settings)) {

                add_settings_error(oisToSlug($this->getFullName()), 'invalid-' . $setting, oisToHuman($setting) . ' does not exist.');
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

                add_settings_error(oisToSlug($this->getFullName()), 'invalid-' . $setting, oisToHuman($setting) . ' is not valid.');
            }
        }

        return $pluginSettings;
    }

    public function displaySettingsMenu() {

        if (!current_user_can('manage_options')) {
            wp_die( __('You do not have sufficient permissions to access this page.'));
	    }

        $name = $this->getFullName();

        $human = oisToHuman($name);
        $slug  = oisToSlug($name);

        if ($overridden_template = locate_template($this->templateFile)) {

            // locate_template() returns path to file
            // if either the child theme or the parent theme have overridden the template
            include $overridden_template;

        } else {

            // If neither the child nor parent theme have overridden the template,
            // we load the template from the 'templates' sub-directory of the directory this file is in
            include $this->templateDir . DS . $this->templateFile;
        }
    }

    public function printSectionInfo($section) {

        if($section['title'] !== oisToHuman($this->getFullName())) {

            echo '<h4>' . $section['title'] . ':' . '</h4>';
        }
    }

    public function printTextSetting($setting) {

        $input = '<input type="text" id="'. $setting[0] . '" name="' . oisToSlug($this->getFullName()) . '[' . $setting[0] . ']" value="%s" />';

        printf(
            $input,
            esc_attr($setting[1])
        );
    }

    public function printEmailSetting($setting) {

        $input = '<input type="email" id="'. $setting[0] . '" name="' . oisToSlug($this->getFullName()) . '[' . $setting[0] . ']" value="%s" />';

        printf(
            $input,
            esc_attr($setting[1])
        );
    }

    /* Methods: Protected/Private ------------------------------------------- */

    /* ---------------------------------------------------------------------- */
}
