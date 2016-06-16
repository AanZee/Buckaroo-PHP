<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service;

trait ServicesTrait
{
    /**
     * Get the services object
     *
     * @return Services
     */
    public function getServicesObject()
    {
        /*
         *
         * !! IMPORTANT !!
         *
         * We can't use the classmap for the Services key because Services is
         * reserved by PHP SOAP and will therefore always return an stdClass.
         *
         */

        $oServices = new Services();

        $oServices->setService($this->Services->Service);

        return $oServices;
    }

    /**
     * Get all the services
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service\Service[]
     */
    public function getServices()
    {
        return $this->getServicesObject()->getServices();
    }

    /**
     * Check if the service is available
     *
     * @param string $sName The name of the service to find
     *
     * @return bool
     */
    public function hasService($sName)
    {
        $bHasService = false;

        foreach ($this->getServices() as $oService) {
            if ($oService->getName() == $sName) {
                $bHasService = true;
                break;
            }
        }

        return $bHasService;
    }

    /**
     * Get a single service
     *
     * @param string $sName The name of the service to find
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service\Service
     */
    public function getService($sName)
    {
        $mService = false;

        foreach ($this->getServices() as $oService) {
            if ($oService->getName() == $sName) {
                $mService = $oService;
                break;
            }
        }

        return $mService;
    }
}