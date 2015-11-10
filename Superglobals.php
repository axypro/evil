<?php
/**
 * @package axy\evil
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\evil;

/**
 * Access to the super-global arrays
 *
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class Superglobals
{
    /**
     * Returns $_SERVER
     *
     * @return array
     */
    public static function &getSERVER()
    {
        if (!isset($_SERVER)) {
            return null;
        }
        return $_SERVER;
    }

    /**
     * Returns $_GET
     *
     * @return array
     */
    public static function &getGET()
    {
        if (!isset($_GET)) {
            return null;
        }
        return $_GET;
    }

    /**
     * Returns $_POST
     *
     * @return array
     */
    public static function &getPOST()
    {
        if (!isset($_POST)) {
            return null;
        }
        return $_POST;
    }

    /**
     * Returns $_REQUEST
     *
     * @return array
     */
    public static function &getREQUEST()
    {
        if (!isset($_REQUEST)) {
            return null;
        }
        return $_REQUEST;
    }

    /**
     * Returns $_COOKIE
     *
     * @return array
     */
    public static function &getCOOKIE()
    {
        if (!isset($_COOKIE)) {
            return null;
        }
        return $_COOKIE;
    }

    /**
     * Returns $_FILES
     *
     * @return array
     */
    public static function &getFILES()
    {
        if (!isset($_FILES)) {
            return null;
        }
        return $_FILES;
    }

    /**
     * Returns $_SESSION
     *
     * @return array
     */
    public static function &getSESSION()
    {
        if (!isset($_SESSION)) {
            return null;
        }
        return $_SESSION;
    }

    /**
     * Returns $_ENV
     *
     * @return array
     */
    public static function &getENV()
    {
        if (!isset($_ENV)) {
            return null;
        }
        return $_ENV;
    }
}
