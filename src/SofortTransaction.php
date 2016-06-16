<?php namespace SeBuDesign\Buckaroo;

use SeBuDesign\Buckaroo\Helpers\ServiceHelper;

class SofortTransaction extends Transaction
{
    /**
     * Are you selling physical goods?
     *
     * @return $this
     */
    public function sellingPhysicalGoods()
    {
        $this->setService(ServiceHelper::SERVICE_SOFORT_PHYSICAL);

        return $this;
    }

    /**
     * Are you selling digital goods or services?
     *
     * @return $this
     */
    public function sellingDigitalGoodsOrServices()
    {
        $this->setService(ServiceHelper::SERVICE_SOFORT_DIGITAL_AND_SERVICES);

        return $this;
    }
}