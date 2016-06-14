<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

class CreditCardTransaction extends Transaction
{
    /**
     * Sets a unique customer code
     *
     * @param string $sCustomerCode The customer code
     *
     * @return $this
     */
    public function setCustomerCode($sCustomerCode)
    {
        return $this->addServiceParameter('customercode', $sCustomerCode);
    }

    /**
     * Set the amount
     *
     * @param float $fAmount The amount a person has to pay
     *
     * @return $this
     */
    public function setAmount($fAmount)
    {
        $this->setAmountDebit($fAmount);

        return $this;
    }

    /**
     * Get the static iDeal banks
     *
     * @return array
     */
    public static function getStaticCreditCardTypes()
    {
        return [
            [
                'name' => 'MasterCard',
                'code' => ServiceHelper::SERVICE_MASTERCARD,
            ],
            [
                'name' => 'Visa',
                'code' => ServiceHelper::SERVICE_VISA,
            ],
            [
                'name' => 'American Express',
                'code' => ServiceHelper::SERVICE_AMERICAN_EXPRESS,
            ],
            [
                'name' => 'Maestro',
                'code' => ServiceHelper::SERVICE_MAESTRO,
            ],
            [
                'name' => 'VPay',
                'code' => ServiceHelper::SERVICE_VPAY,
            ],
            [
                'name' => 'Visa Electron',
                'code' => ServiceHelper::SERVICE_VISA_ELECTRON,
            ],
            [
                'name' => 'Carte Bleue',
                'code' => ServiceHelper::SERVICE_CARTE_BLEUE,
            ],
            [
                'name' => 'Carte Bancaire',
                'code' => ServiceHelper::SERVICE_CARTE_BANCAIRE,
            ],
            [
                'name' => 'Dankort',
                'code' => ServiceHelper::SERVICE_DANKORT,
            ],
        ];
    }
}