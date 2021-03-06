<?php
/**
 * The Controller Utility
 *
 * These are the basic functions for the controller utility
 *
 * @package      Itb
 * @author       Pijus Jasaitis
 */

namespace Itb;

/**
 * Represents the Controller Utility
 *
 * Class ControllerUtility
 * @package Itb
 */
class ControllerUtility
{
    /**
     * Add a namespace to the string, after exploding controller name from action
     *
     * @param string $namespace
     * @param string $shortName
     * @return string namespace
     */
    public static function controller($namespace, $shortName)
    {
        list($shortClass, $shortMethod) = explode('/', $shortName, 2);

        $shortClassCapitlise = ucfirst($shortClass);

        $namespaceClassAction = sprintf($namespace . '\\' . $shortClassCapitlise . 'Controller::' . $shortMethod . 'Action');

        return $namespaceClassAction;
    }
}


