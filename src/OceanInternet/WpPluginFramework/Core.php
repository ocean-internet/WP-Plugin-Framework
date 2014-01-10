<?php
namespace OceanInternet\WpPluginFramework;

class Core {
    /* Properties: Dependencies --------------------------------------------- */

    protected $templateDir;

    /* Properties: Public --------------------------------------------------- */

    /* Properties: Protected/Private ---------------------------------------- */

    /* Methods: Constructor ------------------------------------------------- */

    public function __construct($templateDir=NULL) {

        if(NULL === $templateDir) {

            $templateDir = OIS_WPPF_DIR . DS . 'templates';
        }

        $this->templateDir = $templateDir;
    }

    /* Methods: Getter/Setter ----------------------------------------------- */

    /* Methods: Public ------------------------------------------------------ */

    /* Methods: Protected/Private ------------------------------------------- */

    protected function getParentName() {

        $class = get_class($this);

        $classArray = explode('\\', $class);

        array_pop($classArray);

        return array_pop($classArray);
    }

    protected function getName() {

        $class = get_class($this);

        $classArray = explode('\\', $class);

        return array_pop($classArray);
    }

    protected function getFullName() {

        return $this->getParentName() . $this->getName();
    }

    protected function getTemplate($templateFile) {

        if ($overridden_template = locate_template($templateFile)) {

            // locate_template() returns path to file
            // if either the child theme or the parent theme have overridden the template
            return $overridden_template;

        } else {

            // If neither the child nor parent theme have overridden the template,
            // we load the template from the 'templates' sub-directory of the directory this file is in
            return $this->templateDir . DS . $templateFile;
        }
    }

    protected function getSettings() {

        $settings = get_option(oisToSlug($this->getParentName() . 'Settings'));

        if(empty($settings['api_url']) || empty($settings['product_code']) || empty($settings['api_key'])) {

            return FALSE;
        }

        return $settings;
    }

    /* ---------------------------------------------------------------------- */
}
