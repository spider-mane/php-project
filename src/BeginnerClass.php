<?php

namespace PseudoVendor\PseudoPackage;

class BeginnerClass
{
    /**
     * Create a new BeginnerClass.
     */
    public function __construct()
    {
        // constructor body
    }

    /**
     * Friendly welcome.
     *
     * @param string $phrase Phrase to return
     * @return string Returns the phrase passed in
     */
    public function returnPhrase(string $phrase): string
    {
        return $phrase;
    }
}
