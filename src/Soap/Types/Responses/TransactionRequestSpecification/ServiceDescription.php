<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class ServiceDescription
{
    /**
     * The name of the service
     *
     * @var string
     */
    protected $Name;

    /**
     * The version of the service
     *
     * @var integer
     */
    protected $Version;

    /**
     * The description of the service
     *
     * @var string
     */
    protected $Description;

    /**
     * The action descriptions
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ActionDescription[]
     */
    protected $ActionDescription;

    /**
     * Get the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get the version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->Version;
    }

    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Get the action descriptions
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ActionDescription[]
     */
    public function getActionDescriptions()
    {
        if ($this->ActionDescription instanceof ActionDescription) {
            $this->ActionDescription = [
                $this->ActionDescription
            ];
        }

        return $this->ActionDescription;
    }

    public function getAction($sAction)
    {
        $mReturn = false;

        foreach ($this->getActionDescriptions() as $oActionDescription) {
            if ($oActionDescription->getName() == $sAction) {
                $mReturn = $oActionDescription;
                break;
            }
        }

        return $mReturn;
    }
}