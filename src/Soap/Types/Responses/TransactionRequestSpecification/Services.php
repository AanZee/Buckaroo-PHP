<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class Services
{
    /**
     * The service descriptions
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ServiceDescription[]
     */
    protected $ServiceDescription;
    
    /**
     * Set the service descriptions
     *
     * @param \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ServiceDescription[] $mServiceDescriptions The service descriptions
     */
    public function setServiceDescriptions($mServiceDescriptions)
    {
        if ($mServiceDescriptions instanceof ServiceDescription) {
            $mServiceDescriptions = [
                $mServiceDescriptions
            ];
        }

        $this->ServiceDescription = $mServiceDescriptions;
    }

    /**
     * Get the service descriptions
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ServiceDescription[]
     */
    public function getServiceDescriptions()
    {
        return $this->ServiceDescription;
    }
}