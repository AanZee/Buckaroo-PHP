<?php namespace SeBuDesign\Buckaroo;

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
                'code' => Transaction::SERVICE_MASTERCARD,
            ],
            [
                'name' => 'Visa',
                'code' => Transaction::SERVICE_VISA,
            ],
            [
                'name' => 'American Express',
                'code' => Transaction::SERVICE_AMERICAN_EXPRESS,
            ],
            [
                'name' => 'Maestro',
                'code' => Transaction::SERVICE_MAESTRO,
            ],
            [
                'name' => 'VPay',
                'code' => Transaction::SERVICE_VPAY,
            ],
            [
                'name' => 'Visa Electron',
                'code' => Transaction::SERVICE_VISA_ELECTRON,
            ],
            [
                'name' => 'Carte Bleue',
                'code' => Transaction::SERVICE_CARTE_BLEUE,
            ],
            [
                'name' => 'Carte Bancaire',
                'code' => Transaction::SERVICE_CARTE_BANCAIRE,
            ],
            [
                'name' => 'Dankort',
                'code' => Transaction::SERVICE_DANKORT,
            ],
        ];
    }
}