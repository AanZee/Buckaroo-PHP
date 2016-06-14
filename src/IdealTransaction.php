<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

class IdealTransaction extends Transaction
{
    /**
     * IdealTransaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo website key
     * @param string $sPemPath    The path to the PEM file
     */
    public function __construct($sWebsiteKey, $sPemPath)
    {
        parent::__construct($sWebsiteKey, $sPemPath);

        $this->setService(ServiceHelper::SERVICE_IDEAL);
    }

    /**
     * Sets the iDeal issuer
     *
     * @param string $sIssuer The iDeal issuer
     *
     * @return $this
     */
    public function setIdealIssuer($sIssuer)
    {
        return $this->addServiceParameter('issuer', $sIssuer);
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
    public static function getStaticIdealBanks()
    {
        return [
            [
                'name' => 'ABN AMRO',
                'code' => ServiceHelper::IDEAL_ABN_AMRO,
            ],
            [
                'name' => 'ASN Bank',
                'code' => ServiceHelper::IDEAL_ASN_BANK,
            ],
            [
                'name' => 'ING',
                'code' => ServiceHelper::IDEAL_ING,
            ],
            [
                'name' => 'Rabobank',
                'code' => ServiceHelper::IDEAL_RABOBANK,
            ],
            [
                'name' => 'SNS Bank',
                'code' => ServiceHelper::IDEAL_SNS_BANK,
            ],
            [
                'name' => 'RegioBank',
                'code' => ServiceHelper::IDEAL_REGIO_BANK,
            ],
            [
                'name' => 'Triodos Bank',
                'code' => ServiceHelper::IDEAL_TRIODOS_BANK,
            ],
            [
                'name' => 'Van Lanschot',
                'code' => ServiceHelper::IDEAL_VAN_LANSCHOT,
            ],
            [
                'name' => 'Knab bank',
                'code' => ServiceHelper::IDEAL_KNAB_BANK,
            ],
            [
                'name' => 'Bunq',
                'code' => ServiceHelper::IDEAL_BUNQ,
            ],
        ];
    }
}