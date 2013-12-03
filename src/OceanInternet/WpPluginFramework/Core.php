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

    protected function getName() {

        $class = get_class($this);

        $classArray = explode('\\', $class);

        array_pop($classArray);

        return array_pop($classArray);
    }

    protected function getFullName() {

        $class = get_class($this);

        $classArray = explode('\\', $class);

        return $this->getName() . array_pop($classArray);
    }

    /* ---------------------------------------------------------------------- */
}
