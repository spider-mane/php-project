<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use PseudoVendor\PseudoPackage\BeginnerClass;

class BeginnerClassTest extends TestCase
{
    /**
     * Test the BeginnerClass returns phrase
     */
    public function testReturnsProvidedPhrase()
    {
        $phrase = 'Sup Bruh!';
        $class = new BeginnerClass();

        $this->assertEquals($phrase, $class->returnPhrase($phrase));
    }
}
