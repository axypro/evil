<?php
/**
 * @package axy\evil
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\evil;

/**
 * Access to global variables
 *
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class Globals
{
    /**
     * Returns $GLOBALS
     *
     * @return array
     */
    public static function &getGLOBALS()
    {
        return $GLOBALS;
    }

    /**
     * Sets a global variable
     *
     * @param string $name
     * @param mixed $value
     */
    public static function set($name, $value)
    {
        $GLOBALS[$name] = $value;
    }

    /**
     * Returns the value of a global variable
     *
     * @param string $name
     * @param mixed $default [optional]
     * @return mixed
     */
    public static function get($name, $default = null)
    {
        return array_key_exists($name, $GLOBALS) ? $GLOBALS[$name] : $default;
    }

    /**
     * Removes a variable from the global scope
     *
     * @param string $name
     */
    public static function remove($name)
    {
        unset($GLOBALS[$name]);
    }
}
