<?php namespace SeBuDesign\Buckaroo;

class IdealTransaction extends Transaction
{
    const BANK_ABN_AMRO = 'ABNANL2A';
    const BANK_ASN_BANK = 'ASNBNL21';
    const BANK_ING = 'INGBNL2A';
    const BANK_RABOBANK = 'RABONL2U';
    const BANK_SNS_BANK = 'SNSBNL2A';
    const BANK_REGIO_BANK = 'RBRBNL21';
    const BANK_TRIODOS_BANK = 'TRIONL2U';
    const BANK_VAN_LANSCHOT = 'FVLBNL22';
    const BANK_KNAB_BANK = 'KNABNL2H';
    const BANK_BUNQ = 'BUNQNL2A';

    /**
     * IdealTransaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo website key
     * @param string $sPemPath    The path to the PEM file
     */
    public function __construct($sWebsiteKey, $sPemPath)
    {
        parent::__construct($sWebsiteKey, $sPemPath);

        $this->setService(Transaction::SERVICE_IDEAL);
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
                'code' => self::BANK_ABN_AMRO,
            ],
            [
                'name' => 'ASN Bank',
                'code' => self::BANK_ASN_BANK,
            ],
            [
                'name' => 'ING',
                'code' => self::BANK_ING,
            ],
            [
                'name' => 'Rabobank',
                'code' => self::BANK_RABOBANK,
            ],
            [
                'name' => 'SNS Bank',
                'code' => self::BANK_SNS_BANK,
            ],
            [
                'name' => 'RegioBank',
                'code' => self::BANK_REGIO_BANK,
            ],
            [
                'name' => 'Triodos Bank',
                'code' => self::BANK_TRIODOS_BANK,
            ],
            [
                'name' => 'Van Lanschot',
                'code' => self::BANK_VAN_LANSCHOT,
            ],
            [
                'name' => 'Knab bank',
                'code' => self::BANK_KNAB_BANK,
            ],
            [
                'name' => 'Bunq',
                'code' => self::BANK_BUNQ,
            ],
        ];
    }
}