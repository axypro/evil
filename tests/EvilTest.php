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

    /**
     * covers ::stop
     * @dataProvider providerBreakpoint
     * @param string $args
     * @param int $code
     * @param string[] $lines
     */
    public function testBreakpoint($args, $code, $lines)
    {
        if (!defined('PHP_BINARY')) {
            $this->markTestSkipped('PHP_BINARY not found');
        }
        $bin = PHP_BINARY;
        $script = realpath(__DIR__.'/tst/breakpoint.php');
        $cmd = $bin.' -f '.$script.' '.$args;
        exec($cmd, $output, $status);
        $this->assertSame($code, $status);
        $this->assertSame($lines, $output);
    }

    /**
     * @return array
     */
    public function providerBreakpoint()
    {
        return [
            [
                '',
                0,
                [
                    'start',
                    'Without line',
                ],
            ],
            [
                'line',
                0,
                [
                    'start',
                    '14: With line',
                ],
            ],
            [
                'line file',
                5,
                [
                    'start',
                    realpath(__DIR__.'/tst/breakpoint.php').':17: With line + file',
                ],
            ],
        ];
    }

    public function testBreakpointStruct()
    {
        if (!defined('PHP_BINARY')) {
            $this->markTestSkipped('PHP_BINARY not found');
        }
        $bin = PHP_BINARY;
        $script = realpath(__DIR__.'/tst/breakpoint.php');
        $cmd = $bin.' -f '.$script.' 1 2 3';
        exec($cmd, $output);
        $output = preg_replace('/\s+/', '', implode('', $output));
        $expected = 'start20:Array([0]=>1[1]=>2[2]=>3)';
        $this->assertSame($expected, $output);
    }

    /**
     * covers ::out
     */
    public function testOut()
    {
        $expected = "This is\n output";
        ob_start();
        Evil::out($expected);
        $actual = ob_get_clean();
        $this->assertSame($actual, $expected);
    }
}
