<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status;


class StatusCode
{
    /**
     * The actual status code
     *
     * @var integer
     */
    protected $Code;

    /**
     * The status sentence
     *
     * @var string
     */
    protected $_;

    /**
     * Get the status code
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->Code;
    }

    /**
     * Get the status sentence
     *
     * @return string
     */
    public function getStatusSentence()
    {
        return $this->_;
    }
}
