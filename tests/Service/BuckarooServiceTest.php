<?php

namespace SeBuDesign\Buckaroo\Tests;

use SeBuDesign\Buckaroo\BuckarooTransaction;

class BuckarooServiceTest extends TestCase
{
    public function testIsInTestMode()
    {
        $oBuckarooService = new BuckarooTransaction('CHANGEME', __DIR__ . '/../test.pem');
        $oBuckarooService->putInTestMode();
        $oBuckarooService->setAmountDebit(1.52);
        $oBuckarooService->setService(BuckarooTransaction::SERVICE_IDEAL);
        $oBuckarooService->setIdealIssuer('RABONL2U');
        $oBuckarooService->setInvoice('TEST_INVOICE' . time());
        $oResult = $oBuckarooService->perform();
        
        var_dump($oResult);die();
        
        $this->assertTrue($oBuckarooService->p());
    }
}