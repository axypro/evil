<?php
/**
 * @package axy\evil
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\evil\tests;

use axy\evil\Globals;

/**
 * coversDefaultClass axy\evil\Globals
 *
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class GlobalsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::getGLOBALS
     * covers ::get
     * covers ::set
     * covers ::remove
     */
    public function testGlobals()
    {
        $key = 'test__'.microtime(true);
        $g = &Globals::getGLOBALS();
        unset($GLOBALS[$key]);
        $this->assertFalse(isset($GLOBALS[$key]));
        $g[$key] = 5;
        $this->assertTrue(isset($GLOBALS[$key]));
        $this->assertSame(5, $GLOBALS[$key]);
        $this->assertSame(5, Globals::get($key, 15));
        $GLOBALS[$key] = 10;
        $this->assertSame(10, $g[$key]);
        $this->assertSame(10, Globals::get($key, 15));
        $GLOBALS[$key] = null;
        $this->assertSame(null, $g[$key]);
        $this->assertSame(null, Globals::get($key, 15));
        Globals::set($key, 30);
        $this->assertSame(30, $GLOBALS[$key]);
        $this->assertSame(30, $g[$key]);
        $this->assertSame(30, Globals::get($key, 15));
        Globals::remove($key);
        $this->assertFalse(isset($GLOBALS[$key]));
        $this->assertFalse(isset($g[$key]));
        $this->assertSame(15, Globals::get($key, 15));
    }
}
