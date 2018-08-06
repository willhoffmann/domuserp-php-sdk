<?php
namespace DomusErp\SdkTest\Integration\Resources\SalesOrder;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class SalesOrderTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'SalesOrderGetList']));

        $this->assertEquals($domusClient->salesOrder()->getList(), FakeHandler::getJson('SalesOrderGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'SalesOrderGetById']));

        $this->assertEquals($domusClient->salesOrder()->get(41304), FakeHandler::getJson('SalesOrderGetById'));
    }
}