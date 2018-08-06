<?php

namespace DomusErp\SdkTest\Integration\Resources\ProductOrigin;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class ProductOriginTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductOriginGetList']));

        $this->assertEquals($domusClient->productOrigin()->getList(), FakeHandler::getJson('ProductOriginGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductOriginGetById']));

        $this->assertEquals($domusClient->productOrigin()->get(2), FakeHandler::getJson('ProductOriginGetById'));
    }
}