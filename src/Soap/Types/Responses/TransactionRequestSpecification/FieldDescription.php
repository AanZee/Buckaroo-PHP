<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class FieldDescription
{
    /**
     * The name of the field
     * 
     * @var string
     */
    protected $Name;

    /**
     * The data type of the field
     * 
     * @var string
     */
    protected $DataType;

    /**
     * The maximum length of a field
     * 
     * @var null|integer
     */
    protected $MaxLength;

    /**
     * Is the field required?
     * 
     * @var boolean
     */
    protected $Required;

    /**
     * The description of the field
     * 
     * @var string
     */
    protected $Description;

    /**
     * All the attributes that belong of this field
     * 
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\FieldDescription[]
     */
    protected $Attributes;

    /**
     * All the list item descriptions of this field
     * 
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ListItemDescription[]
     */
    protected $ListItemDescription;

    /**
     * The list type
     *
     * @var string
     */
    protected $List;

    /**
     * Get the name of the field
     * 
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get the data type of the field
     * 
     * @return string
     */
    public function getDataType()
    {
        return $this->DataType;
    }

    /**
     * Get the maximum length of the field
     * 
     * @return int|null
     */
    public function getMaximumLength()
    {
        return $this->MaxLength;
    }

    /**
     * Does this field has attributes?
     *
     * @return bool
     */
    public function hasAttributes()
    {
        return $this->Attributes !== null;
    }

    /**
     * Get all the attributes
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\FieldDescription[]
     */
    public function getAttributes()
    {
        return $this->Attributes;
    }

    /**
     * Get a specific attribute
     *
     * @param string $sAttributeName The attribute name
     *
     * @return bool|\SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\FieldDescription
     */
    public function getAttribute($sAttributeName)
    {
        $mReturn = false;

        foreach ($this->Attributes as $oAttribute) {
            if ($oAttribute->getName() == $sAttributeName) {
                $mReturn = $oAttribute;
                break;
            }
        }

        return $mReturn;
    }

    /**
     * Does the specific attribute exists?
     *
     * @param string $sAttributeName The attribute name
     *
     * @return bool
     */
    public function hasAttribute($sAttributeName)
    {
        $bReturn = false;

        foreach ($this->Attributes as $oAttribute) {
            if ($oAttribute->getName() == $sAttributeName) {
                $bReturn = true;
                break;
            }
        }

        return $bReturn;
    }

    /**
     * Does this field has list item descriptions?
     *
     * @return bool
     */
    public function hasListItems()
    {
        return $this->ListItemDescription !== null;
    }

    /**
     * Get all the attributes
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification\ListItemDescription[]
     */
    public function getListItems()
    {
        return $this->ListItemDescription;
    }

    /**
     * Get the list type
     *
     * @return string
     */
    public function getListType()
    {
        return $this->List;
    }
}