<?php

namespace DomusErp\SdkTest\Integration\Resources\Units;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class UnitsTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'UnitsGetList']));

        $this->assertEquals($domusClient->units()->getList(), FakeHandler::getJson('UnitsGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'UnitsGetById']));

        $this->assertEquals($domusClient->units()->get('BDJ'), FakeHandler::getJson('UnitsGetById'));
    }
}