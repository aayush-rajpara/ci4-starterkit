<?php
namespace Config;

use ReflectionClass;
use ReflectionProperty;

class Registrar
{
	public static $ModuleLocation = ROOTPATH . 'Modules';
    public static $ModuleJson = APPPATH . "Config/ActivatedModules.json";

    public static  function registerNamespaces() {
        $modules = file_get_contents(Registrar::$ModuleJson);
        $modules = @json_decode($modules);
        $psr4 = [];
        if (!($modules && is_array($modules) && count($modules))) {
            return $psr4;
        }
        foreach ($modules as $module) {
                /*$psr4[$plugin] = ROOTPATH . 'modules' . DIRECTORY_SEPARATOR . $plugin;*/
                //$psr4[$plugin][] = ROOTPATH . 'modules' . DIRECTORY_SEPARATOR . $plugin;
                $psr4[$module][] = Registrar::$ModuleLocation . DIRECTORY_SEPARATOR . $module.DIRECTORY_SEPARATOR ;
        }

       /* $Autoload = config('Autoload');
        $rp = new ReflectionProperty($Autoload, 'psr4');*/
        $Autoload = service('autoloader');
        $rp = new ReflectionProperty($Autoload, 'prefixes');
        $rp->setAccessible(true);
        $prefixes = $rp->getValue($Autoload);
        $keys     = array_keys($prefixes);

        $prefixesStart = array_slice($prefixes, 0, array_search('Config', $keys, true) + 1);
        $prefixesEnd   = array_slice($prefixes, array_search('Config', $keys, true) + 1);
        $prefixes      = array_merge($prefixesStart, $psr4, $prefixesEnd);
       
        $rp->setValue($Autoload, $prefixes);
    }
}

//Register all Modules here
Registrar::registerNamespaces();