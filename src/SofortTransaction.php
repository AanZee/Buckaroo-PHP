<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException;
use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

class PayPalTransaction extends Transaction
{
    /**
     * PayPalTransaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo website key
     * @param string $sPemPath    The path to the PEM file
     */
    public function __construct($sWebsiteKey, $sPemPath)
    {
        parent::__construct($sWebsiteKey, $sPemPath);

        $this->setService(ServiceHelper::SERVICE_PAYPAL);
    }

    /**
     * Sets the email address of the customer
     *
     * @param string $sCustomerEmail The customers email address
     *
     * @return $this
     */
    public function setCustomerEmail($sCustomerEmail)
    {
        return $this->addServiceParameter('BuyerEmail', $sCustomerEmail);
    }

    /**
     * Sets the stylesheet url for the PayPal page
     *
     * @param string $sPageStylesheetUrl The page stylesheet url
     *
     * @return $this
     *
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException
     */
    public function setPageStylesheetUrl($sPageStylesheetUrl)
    {
        if (strlen($sPageStylesheetUrl) > 30) {
            throw new BuckarooArgumentException("The page stylesheet url is to long, max 30 characters");
        }

        return $this->addServiceParameter('PageStyle', $sPageStylesheetUrl);
    }

    /**
     * Sets the billing agreement for the customer in PayPal
     *
     * @param string $sBillingAgreement The billing agreement
     *
     * @return $this
     *
     * @throws \SeBuDesign\Buckaroo\Exceptions\BuckarooArgumentException
     */
    public function setBillingAgreement($sBillingAgreement)
    {
        if (strlen($sBillingAgreement) > 127) {
            throw new BuckarooArgumentException("The billing agreement text is to long, max 127 characters");
        }

        return $this->addServiceParameter('BillingAgreementDescription', $sBillingAgreement);
    }

    /**
     * Sets the product name for PayPal
     *
     * @param string $sProductName The product name
     *
     * @return $this
     */
    public function setProductName($sProductName)
    {
        return $this->addServiceParameter('ProductName', $sProductName);
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
}