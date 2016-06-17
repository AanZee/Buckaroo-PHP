<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\TransactionRequestSpecification;

class ParameterDescription
{
    protected $Name;
    protected $List;
    protected $ListItemDescription;

    public function getName()
    {
        return $this->Name;
    }

    public function getListItems()
    {
        $mReturn = false;

        if (!is_null($this->ListItemDescription)) {
            if ($this->ListItemDescription instanceof ListItemDescription) {
                $this->ListItemDescription = [
                    $this->ListItemDescription
                ];
            }

            $mReturn = $this->ListItemDescription;
        }

        return $mReturn;
    }
}