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
}
