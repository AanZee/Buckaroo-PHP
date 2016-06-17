<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status;

trait StatusTrait
{
    /**
     * Get the status object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\Status
     */
    public function getStatusObject()
    {
        return $this->Status;
    }

    /**
     * Get the status code object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\StatusCode
     */
    public function getStatusCodeObject()
    {
        return $this->getStatusObject()->getStatusCodeObject();
    }

    /**
     * Get the status code
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->getStatusCodeObject()->getStatusCode();
    }

    /**
     * Get the sub code object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\StatusCode
     */
    public function getSubCodeObject()
    {
        return $this->getStatusObject()->getSubCodeObject();
    }

    /**
     * Does the response has a sub code?
     *
     * @return boolean
     */
    public function hasSubCode()
    {
        return $this->getSubCodeObject() !== null;
    }

    /**
     * Get the sub code
     *
     * @return integer
     */
    public function getSubCode()
    {
        return $this->getSubCodeObject()->getStatusCode();
    }
}