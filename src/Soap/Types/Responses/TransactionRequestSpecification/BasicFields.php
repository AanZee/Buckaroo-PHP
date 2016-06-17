<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class BasicFields
{
    /**
     * All the basic fields of the request
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\FieldDescription[]
     */
    protected $FieldDescription;

    /**
     * Does the response has basic fields
     *
     * @return bool
     */
    public function hasFieldDescriptions()
    {
        return $this->FieldDescription !== null;
    }

    /**
     * Get all the field descriptions
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\FieldDescription[]
     */
    public function getFieldDescriptions()
    {
        return $this->FieldDescription;
    }

    /**
     * Get a specific field
     *
     * @param string $sFieldName The field name to search
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\FieldDescription
     */
    public function getDescriptionForField($sFieldName)
    {
        $mReturn = false;

        foreach ($this->FieldDescription as $oFieldDescription)
        {
            if ($oFieldDescription->getName() == $sFieldName) {
                $mReturn = $oFieldDescription;
                break;
            }
        }

        return $mReturn;
    }

    /**
     * is the field in the array of fields?
     *
     * @param string $sFieldName The field name to search
     *
     * @return bool
     */
    public function hasDescriptionForField($sFieldName)
    {
        $bReturn = false;

        foreach ($this->FieldDescription as $oFieldDescription)
        {
            if ($oFieldDescription->getName() == $sFieldName) {
                $bReturn = true;
                break;
            }
        }

        return $bReturn;
    }
}