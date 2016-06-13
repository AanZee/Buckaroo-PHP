<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\ConsumerMessage;

interface ConsumerMessageInterface
{
    /**
     * The consumer message object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\ConsumerMessage\ConsumerMessage
     */
    public function getConsumerMessageObject();
}