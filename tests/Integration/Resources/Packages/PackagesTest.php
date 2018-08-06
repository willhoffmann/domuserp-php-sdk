<?php

namespace DomusErp\SdkTest\Integration\Resources\Packages;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class PackagesTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PackagesGetList']));

        $this->assertEquals($domusClient->packages()->getList(), FakeHandler::getJson('PackagesGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PackagesGetById']));

        $this->assertEquals($domusClient->packages()->get(4), FakeHandler::getJson('PackagesGetById'));
    }
}