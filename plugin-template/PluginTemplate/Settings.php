<?php
/**
 * Project:    WP-Plugin-Framework
 * File:       PluginTemplateSettings.php
 * Created by: Andy Weir <andy@uknetweb.com>
 */

namespace UKNetWeb\PluginTemplate;

/**
 * PluginTemplateSettings
 *
 * @package UKNetWeb\PluginTemplate
 */
class  Settings extends \OceanInternet\WpPluginFramework\Settings {

    /* ---------- Properties: Dependencies ---------------------------------- */

    /* ---------- Properties: Public ---------------------------------------- */

    /* ---------- Properties: Protected/Private ----------------------------- */

    protected $settings = array(
        'title',
        'comment'       => array(
            'clean' => 'text_field'
        ),
        'email_address' => array(
            'valid' => 'is_email',
            'clean' => 'text_field',
            'input' => 'email'
        )
    );
    /* ---------- Methods: Constructor -------------------------------------- */
    /* ---------- Methods: Magic Methods ------------------------------------ */
    /* ---------- Methods: Getters/Setters ---------------------------------- */
    /* ---------- Methods: Public ------------------------------------------- */
    /* ---------- Methods: Private/Protected -------------------------------- */
    /* ---------------------------------------------------------------------- */
}
