<?php

namespace DomusErp\SdkTest\Integration\Resources\Ncm;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class NcmTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'NcmGetList']));

        $this->assertEquals($domusClient->ncm()->getList(), FakeHandler::getJson('NcmGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'NcmGetById']));

        $this->assertEquals($domusClient->ncm()->get(90328911), FakeHandler::getJson('NcmGetById'));
    }
}