<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PseudoVendor\PseudoPackage\BeginnerClass;

class BeginnerClassTest extends TestCase
{
    /**
     * Test the method
     */
    public function testTrueIsTrue()
    {
        $phrase = 'Sup Bruh!';
        $class = new BeginnerClass();

        $this->assertEquals($phrase, $class->echoPhrase($phrase));
    }
}
