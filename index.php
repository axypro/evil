<?php
/**
 * Necessary evil
 *
 * @package axy\evil
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 * @license https://raw.github.com/axypro/evil/master/LICENSE MIT
 * @link https://github.com/axypro/evil repository
 * @link https://packagist.org/packages/axy/evil composer package
 * @uses PHP5.4+
 */

namespace axy\evil;

if (!is_file(__DIR__.'/vendor/autoload.php')) {
    throw new \LogicException('Please: composer install');
}

require_once(__DIR__.'/vendor/autoload.php');
