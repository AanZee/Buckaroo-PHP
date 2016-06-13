<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service;

class Services
{
    /**
     * The services
     * 
     * @var Service[]
     */
    protected $Service;

    /**
     * Set the Service variable to the desired value
     *
     * @param mixed $mService The service to set
     *
     * @return $this
     */
    public function setService($mService)
    {
        $this->Service = $mService;

        return $this;
    }

    /**
     * An array of the services
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service\Service[]
     */
    public function getServices()
    {
        if ($this->Service instanceof Service) {
            $this->Service = [
                $this->Service
            ];
        }

        return $this->Service;
    }
}