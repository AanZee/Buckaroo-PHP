<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface;

class Body implements BodyInterface
{
    /**
     * The basic fields
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\BasicFields
     */
    protected $BasicFields;

    /**
     * The service details
     *
     * @var \stdClass
     */
    protected $Services;

    /**
     * Get the basic fields
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\BasicFields
     */
    public function getBasicFields()
    {
        return $this->BasicFields;
    }

    /**
     * Get the services
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\Services
     */
    public function getServices()
    {
        $mServiceDescriptions = $this->Services->ServiceDescription;
        $this->Services = new Services();
        $this->Services->setServiceDescriptions($mServiceDescriptions);
        return $this->Services;
    }

    /**
     * Is the service in the response (and active)?
     *
     * @param string $sService The service to check
     *
     * @return bool
     */
    public function hasService($sService)
    {
        $bReturn = false;

        foreach ($this->getServices()->getServiceDescriptions() as $oServiceDescription)
        {
            if ($oServiceDescription->getName() == $sService) {
                $bReturn = true;
                break;
            }
        }

        return $bReturn;
    }

    /**
     * Get a specific service
     *
     * @param string $sService The service to get
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ServiceDescription
     */
    public function getService($sService)
    {
        $mReturn = false;

        foreach ($this->getServices()->getServiceDescriptions() as $oServiceDescription)
        {
            if ($oServiceDescription->getName() == $sService) {
                $mReturn = $oServiceDescription;
                break;
            }
        }

        return $mReturn;
    }

    /**
     * Does the response have errors
     *
     * We don't check the errors here because we want to be able to parse the result if only one transaction key does not exists
     * 
     * @return bool
     */
    public function hasErrors()
    {
        return false;
    }
}
