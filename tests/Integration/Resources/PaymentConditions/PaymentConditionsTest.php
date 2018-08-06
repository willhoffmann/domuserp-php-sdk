<?php

namespace DomusErp\SdkTest\Integration\Resources\PaymentConditions;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class PaymentConditionsTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PaymentConditionsGetList']));

        $this->assertEquals($domusClient->paymentConditions()->getList(), FakeHandler::getJson('PaymentConditionsGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PaymentConditionsGetById']));

        $this->assertEquals($domusClient->paymentConditions()->get(2), FakeHandler::getJson('PaymentConditionsGetById'));
    }
}