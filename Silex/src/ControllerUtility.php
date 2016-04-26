<?php
namespace Itb;

class ControllerUtility
{
    /**
     * Control namespaces and navigation through the site
     *
     * @param $namespace
     * @param $shortName
     * @return string
     */
    public static function controller($namespace, $shortName)
    {
        list($shortClass, $shortMethod) = explode('/', $shortName, 2);

        $shortClassCapitlise = ucfirst($shortClass);

        $namespaceClassAction = sprintf($namespace . '\\' . $shortClassCapitlise . 'Controller::' . $shortMethod . 'Action');

        return $namespaceClassAction;
    }
}


