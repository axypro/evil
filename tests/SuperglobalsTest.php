<?php
/**
 * @package axy\evil
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\evil\tests;

use axy\evil\Superglobals;

/**
 * coversDefaultClass axy\evil\Superglobals
 *
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class SuperglobalsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::getSERVER
     * covers ::getGET
     * covers ::getPOST
     * covers ::getREQUEST
     * covers ::getCOOKIE
     * covers ::getFILES
     * covers ::getSESSION
     * covers ::getENV
     */
    public function testGet()
    {
        $this->assertEquals($_SERVER, Superglobals::getSERVER());
        $this->assertEquals($_GET, Superglobals::getGET());
        $this->assertEquals($_POST, Superglobals::getPOST());
        $this->assertEquals($_REQUEST, Superglobals::getREQUEST());
        $this->assertEquals($_COOKIE, Superglobals::getCOOKIE());
        $this->assertEquals($_FILES, Superglobals::getFILES());
        if (isset($_SESSION)) {
            $this->assertEquals($_SESSION, Superglobals::getSESSION());
        }
        $this->assertEquals($_ENV, Superglobals::getENV());
    }

    public function testRef()
    {
        if (!isset($_SERVER)) {
            $this->markTestSkipped();
        }
        $key = 'test__'.microtime(true);
        $server = Superglobals::getSERVER();
        $server[$key] = 'x';
        $this->assertFalse(isset($_SERVER[$key]));
        $server2 = &Superglobals::getSERVER();
        $server2[$key] = 'x';
        $this->assertTrue(isset($_SERVER[$key]));
        $this->assertSame('x', $_SERVER[$key]);
        unset($_SERVER[$key]);
    }
}
