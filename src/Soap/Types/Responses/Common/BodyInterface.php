<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common;

interface BodyInterface
{
    /**
     * Does the response have errors
     *
     * @return boolean
     */
    public function hasErrors();
}