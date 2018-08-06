<?php

namespace DomusErp\SdkTest\Integration\Resources\CommercialSector;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class CommercialSectorTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'CommercialSectorGetList']));

        $this->assertEquals($domusClient->commercialSector()->getList(), FakeHandler::getJson('CommercialSectorGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'CommercialSectorGetById']));

        $this->assertEquals($domusClient->commercialSector()->get(8), FakeHandler::getJson('CommercialSectorGetById'));
    }

    public function testCustomers()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'CommercialSectorCustomers']));

        $this->assertEquals($domusClient->commercialSector()->customers(8), FakeHandler::getJson('CommercialSectorCustomers'));
    }
}