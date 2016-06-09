<?php

namespace SeBuDesign\Buckaroo\Tests;

use SeBuDesign\Buckaroo\BuckarooTransaction;

class BuckarooServiceTest extends TestCase
{
    public function testIsInTestMode()
    {
        $oBuckarooService = new BuckarooTransaction();
        $oBuckarooService->putInTestMode();
        $oBuckarooService->setPemPath(__DIR__ . '/../test.pem');
        $oBuckarooService->setWebsiteKey('CHANGEME');
        
//        $oBuckarooService
//            ->putInTestMode()
//            ->setWebsiteKey('CHANGEME')
//            ->setPemPath( __DIR__ . '/../test.pem')
//            ->setCurrency('EUR')
//            ->setAmountCredit(1.25)
//        ->perform();
        
        var_dump($oBuckarooService->perform());die();
        
        $this->assertTrue($oBuckarooService->isTesting());
    }
}