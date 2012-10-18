<?php

namespace Thelia\Autoload;

use Symfony\Component\ClassLoader\UniversalClassLoader;

/**
 * TheliaUniversalClassLoader 
 * 
 * extends Symfony\Component\ClassLoader\UniversalClassLoader
 * 
 * This class respect PSR-0 autoloading standard and allow to load traditionnal Thelia classes
 * 
 * @author Manuel Raynaud <mraynaud@openstudio.fr>
 * 
 */

class TheliaUniversalClassLoader extends UniversalClassLoader{
    
    private $directories = array();
    
    /**
     * 
     * add path directory where autoload can search files
     * 
     * @param string $directory
     */
    public function addDirectory($directory){
        $this->directories[] = $directory;
    }
    
    
    /**
     * 
     * add multiple path directory in an array where autoload can search files
     * 
     * @param array $directories
     */
    public function addDirectories(array $directories){
        foreach($directories as $directory){
            $this->addDirectory($directory);
        }
    }
    
    /**
     * 
     * return directories where traditional Thelia classes can be found
     * 
     * @return array an Array of directories
     */
    public function getDirectories(){
        return $this->directories;
    }

    /**
     * 
     * Finds the path to the file where the class is defined.
     * 
     * @param string $class The name of the class
     * @return string|null The path, if found
     */
    public function findFile($class) {
        
        foreach($this->directories as $directory){
            
            if(is_file($directory.DIRECTORY_SEPARATOR.$class.".class.php")){
                return $directory.DIRECTORY_SEPARATOR.$class.".class.php";
            }
            
            if(is_file($directory.DIRECTORY_SEPARATOR.$class.".interface.php")){
                return $directory.DIRECTORY_SEPARATOR.$class.".interface.php";
            }
            
        }

        return parent::findFile($class);
    }
    
}


?>