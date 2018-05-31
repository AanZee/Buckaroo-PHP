<?php namespace SeBuDesign\Buckaroo\Helpers;

class ServiceHelper
{
    // Banking
    const SERVICE_IDEAL = 'ideal';
    const SERVICE_PAYPAL = 'paypal';
    const SERVICE_BANCONTACT_MR_CASH = 'bancontactmrcash';
    const SERVICE_SEPA_DIRECT_DEBIT = 'sepadirectdebit';
    const SERVICE_SOFORT_PHYSICAL = 'Sofortueberweisung';
    const SERVICE_SOFORT_DIGITAL_AND_SERVICES = 'SofortDigital';

    // Credit Cards
    const SERVICE_MASTERCARD = 'mastercard';
    const SERVICE_VISA = 'visa';
    const SERVICE_AMERICAN_EXPRESS = 'Amex';
    const SERVICE_MAESTRO = 'maestro';
    const SERVICE_VPAY = 'Vpay';
    const SERVICE_VISA_ELECTRON = 'visaelectron';
    const SERVICE_CARTE_BLEUE = 'cartebleuevisa';
    const SERVICE_CARTE_BANCAIRE = 'Cartebancaire';
    const SERVICE_DANKORT = 'dankort';

    // iDeal banks
    const IDEAL_ABN_AMRO = 'ABNANL2A';
    const IDEAL_ASN_BANK = 'ASNBNL21';
    const IDEAL_ING = 'INGBNL2A';
    const IDEAL_RABOBANK = 'RABONL2U';
    const IDEAL_SNS_BANK = 'SNSBNL2A';
    const IDEAL_REGIO_BANK = 'RBRBNL21';
    const IDEAL_TRIODOS_BANK = 'TRIONL2U';
    const IDEAL_VAN_LANSCHOT = 'FVLBNL22';
    const IDEAL_KNAB_BANK = 'KNABNL2H';
    const IDEAL_BUNQ = 'BUNQNL2A';
    const IDEAL_MONEYOU = 'MOYONL21';
    
    /**
     * Is the string a valid iDeal bank?
     *
     * @param string $sIdealBank The iDeal bank to check
     *
     * @return bool
     */
    public static function isValidIdealBank($sIdealBank)
    {
        return in_array($sIdealBank, [
            self::IDEAL_ABN_AMRO,
            self::IDEAL_ASN_BANK,
            self::IDEAL_ING,
            self::IDEAL_RABOBANK,
            self::IDEAL_SNS_BANK,
            self::IDEAL_REGIO_BANK,
            self::IDEAL_TRIODOS_BANK,
            self::IDEAL_VAN_LANSCHOT,
            self::IDEAL_KNAB_BANK,
            self::IDEAL_BUNQ,
            self::IDEAL_MONEYOU,
        ]);
    }

    /**
     * Is the string a valid Credit Card?
     *
     * @param string $sCreditCardType The Credit Card type to check
     *
     * @return bool
     */
    public static function isValidCreditCardType($sCreditCardType)
    {
        return in_array($sCreditCardType, [
            self::SERVICE_MASTERCARD,
            self::SERVICE_VISA,
            self::SERVICE_AMERICAN_EXPRESS,
            self::SERVICE_MAESTRO,
            self::SERVICE_VPAY,
            self::SERVICE_VISA_ELECTRON,
            self::SERVICE_CARTE_BLEUE,
            self::SERVICE_CARTE_BANCAIRE,
            self::SERVICE_DANKORT,
        ]);
    }

    /**
     * Is the string a valid Buckaroo service?
     *
     * @param string $sBuckarooService The Buckaroo service to check
     *
     * @return bool
     */
    public static function isValidBuckarooService($sBuckarooService)
    {
        return in_array($sBuckarooService, [
            self::SERVICE_MASTERCARD,
            self::SERVICE_VISA,
            self::SERVICE_AMERICAN_EXPRESS,
            self::SERVICE_MAESTRO,
            self::SERVICE_VPAY,
            self::SERVICE_VISA_ELECTRON,
            self::SERVICE_CARTE_BLEUE,
            self::SERVICE_CARTE_BANCAIRE,
            self::SERVICE_DANKORT,
            self::SERVICE_IDEAL,
            self::SERVICE_PAYPAL,
        ]);
    }

}
