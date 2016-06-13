<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\ConsumerMessage;

trait ConsumerMessageTrait
{
    /**
     * The consumer message object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\ConsumerMessage\ConsumerMessage
     */
    public function getConsumerMessageObject()
    {
        return $this->ConsumerMessage;
    }
    
    /**
     * Does the response has a consumer message
     *
     * @return boolean
     */
    public function hasConsumerMessage()
    {
        return $this->getConsumerMessageObject() !== null;
    }

    /**
     * Does the consumer has to read the message?
     *
     * @return boolean
     */
    public function mustReadMessage()
    {
        return $this->getConsumerMessageObject()->mustReadMessage();
    }

    /**
     * Get the consumer message title
     *
     * @return string
     */
    public function getConsumerMessageTitle()
    {
        return $this->getConsumerMessageObject()->getTitle();
    }

    /**
     * Get the consumer message text
     *
     * @param bool $bPlainText Should this function return plain text?
     *
     * @return string
     */
    public function getConsumerMessageText($bPlainText = false)
    {
        $sText = $this->getConsumerMessageObject()->getHtmlText();
        if ($bPlainText) {
            $sText = $this->getConsumerMessageObject()->getPlainText();
        }

        return $sText;
    }
}
