<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status;

class Status
{
    /**
     * The status code object
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\StatusCode
     */
    protected $Code;

    /**
     * The date and time of when the request got the status
     *
     * @var string
     */
    protected $DateTime;

    /**
     * The sub code object
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\StatusCode
     */
    protected $SubCode;

    /**
     * Get the status code object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\StatusCode
     */
    public function getStatusCodeObject()
    {
        return $this->Code;
    }

    /**
     * Get the sub code object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\StatusCode
     */
    public function getSubCodeObject()
    {
        return $this->SubCode;
    }

    /**
     * Get the date and time
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return new \DateTime($this->DateTime);
    }
}
