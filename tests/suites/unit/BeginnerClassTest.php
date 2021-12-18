<?php

declare(strict_types=1);

namespace Tests\Suites\Unit;

use PseudoVendor\PseudoPackage\BeginnerClass;
use Tests\Support\TestCase;

class BeginnerClassTest extends TestCase
{
    protected BeginnerClass $beginnerClass;

    public function setUp(): void
    {
        $this->beginnerClass = new BeginnerClass();
    }

    /**
     * @test
     */
    public function it_returns_provided_phrase()
    {
        $phrase = 'Sup Bruh!';

        $this->assertEquals($phrase, $this->beginnerClass->returnPhrase($phrase));
    }
}
