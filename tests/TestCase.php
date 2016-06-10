<?php

namespace SeBuDesign\Buckaroo\Tests;

use PHPUnit_Framework_TestCase;
use ReflectionClass;

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Access a protected property within an object
     *
     * @param object $oObject   The object on which the property has to be accessed
     * @param string $sProperty The property to read
     *
     * @return mixed
     */
    public function accessProtectedProperty($oObject, $sProperty)
    {
        $reflection = new ReflectionClass($oObject);

        $property = $reflection->getProperty($sProperty);
        $property->setAccessible(true);

        return $property->getValue($oObject);
    }

    /**
     * @test
     */
    public function it_should_run_assertions()
    {
        $this->assertTrue(true);
    }
}