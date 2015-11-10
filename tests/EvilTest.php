<?php
/**
 * @package axy\evil
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\evil\tests;

use axy\evil\Evil;

/**
 * coversDefaultClass axy\evil\Evil
 */
class EvilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::execCode
     */
    public function testExecCode()
    {
        $this->assertSame(4, Evil::execCode('return 2 + 2;'));
        $this->setExpectedException('LogicException', 'message');
        Evil::execCode('throw new LogicException("message");');
    }

    /**
     * covers ::stop
     */
    public function testStop()
    {
        if (!defined('PHP_BINARY')) {
            $this->markTestSkipped('PHP_BINARY not found');
        }
        $bin = PHP_BINARY;
        $script = realpath(__DIR__.'/tst/stop.php');
        $cmd = $bin.' -f '.$script;
        exec($cmd, $output, $status);
        $this->assertSame(10, $status);
        $this->assertSame(['1'], $output);
    }
}
