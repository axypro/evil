<?php
/**
 * @package axy\evil
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\evil;

/**
 * Evil functions
 */
class Evil
{
    /**
     * Executes a PHP-code
     *
     * @param string $code
     * @return mixed
     * @throws \Exception
     * @SuppressWarnings(PHPMD.EvalExpression)
     */
    public static function execCode($code)
    {
        return eval($code);
    }

    /**
     * Terminates the current script
     *
     * @param int $status [optional]
     * @SuppressWarnings(PHPMD.ExitExpression)
     */
    public static function stop($status = null)
    {
        exit($status);
    }

    /**
     * Outputs debug breakpoint and terminates the current script
     *
     * @param mixed $message
     * @param bool $line [optional]
     * @param bool $file [optional]
     * @param int $status [optional]
     */
    public static function breakpoint($message, $line = false, $file = false, $status = null)
    {
        if (!is_scalar($message)) {
            $message = print_r($message, 1);
        }
        $message = self::appendFL($message, $line, $file);
        if (php_sapi_name() === 'cli') {
            $message .= PHP_EOL;
        } else {
            $message = '<pre>'.htmlspecialchars($message, ENT_COMPAT, 'UTF-8').'</pre>';
        }
        self::out($message);
        self::stop($status);
    }

    /**
     * Outputs a message to the stdout
     *
     * @param string $message
     */
    public static function out($message)
    {
        echo $message;
    }

    /**
     * @param string $message
     * @param bool $line
     * @param bool $file
     * @return string
     */
    private static function appendFL($message, $line, $file)
    {
        if (!($line || $file)) {
            return $message;
        }
        $back = debug_backtrace();
        if ((!$back) || (!isset($back[1]))) {
            return $message;
        }
        $back = $back[1];
        $prefix = [];
        if ($file) {
            $prefix[] = $back['file'];
        }
        if ($line) {
            $prefix[] = $back['line'];
        }
        return implode(':', $prefix).': '.$message;
    }
}
