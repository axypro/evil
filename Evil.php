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
}
