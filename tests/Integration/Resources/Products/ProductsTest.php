<?php

namespace DomusErp\SdkTest\Integration\Resources\Products;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class ProductsTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductsGetList']));

        $this->assertEquals($domusClient->products()->getList(), FakeHandler::getJson('ProductsGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductsGetById']));

        $this->assertEquals($domusClient->products()->get(2), FakeHandler::getJson('ProductsGetById'));
    }

    public function testPriceTableGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductsPriceTableGetList']));

        $this->assertEquals(
            $domusClient->products()->priceTable()->getList(['tabelapreco' => 1]),
            FakeHandler::getJson('ProductsPriceTableGetList')
        );
    }

    public function testPriceTableGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductsPriceTableGetById']));

        $this->assertEquals(
            $domusClient->products()->priceTable()->get(85609),
            FakeHandler::getJson('ProductsPriceTableGetById')
        );
    }
}