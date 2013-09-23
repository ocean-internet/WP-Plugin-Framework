<?php
namespace OIS\PluginTemplate;

class Core {
    /* Properties: Dependencies --------------------------------------------- */

    /* Properties: Public --------------------------------------------------- */

    /* Properties: Protected/Private ---------------------------------------- */

    /* Methods: Constructor ------------------------------------------------- */

    /* Methods: Getter/Setter ----------------------------------------------- */

    /* Methods: Public ------------------------------------------------------ */

    /* Methods: Protected/Private ------------------------------------------- */
    
    protected function getName() {
        
        $namespace = __NAMESPACE__;
        
        $namespaceArray = explode('\\', $namespace);
        
        return array_pop($namespaceArray);
    }
    
    protected function getFullName() {
        
        $class = get_class($this);
        
        $classArray = explode('\\', $class);
        
        return $this->getName() . array_pop($classArray);
    }

    /* ---------------------------------------------------------------------- */
}