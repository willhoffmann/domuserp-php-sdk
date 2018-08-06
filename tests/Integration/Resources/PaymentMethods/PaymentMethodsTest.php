<?php

namespace DomusErp\SdkTest\Integration\Resources\PaymentMethods;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class PaymentMethodsTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PaymentMethodsGetList']));

        $this->assertEquals($domusClient->paymentMethods()->getList(), FakeHandler::getJson('PaymentMethodsGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PaymentMethodsGetById']));

        $this->assertEquals($domusClient->paymentMethods()->get(2), FakeHandler::getJson('PaymentMethodsGetById'));
    }
}