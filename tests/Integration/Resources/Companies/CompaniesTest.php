<?php

namespace DomusErp\SdkTest\Integration\Resources\Companies;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class CompaniesTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'CompaniesGetList']));

        $this->assertEquals($domusClient->companies()->getList(), FakeHandler::getJson('CompaniesGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'CompaniesGetById']));

        $this->assertEquals($domusClient->companies()->get(1), FakeHandler::getJson('CompaniesGetById'));
    }

    public function testBranchesGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'BranchesGetList']));

        $this->assertEquals(
            $domusClient->companies()->branches(1)->getList(),
            FakeHandler::getJson('BranchesGetList')
        );
    }

    public function testBranchesGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'BranchesGetById']));

        $this->assertEquals(
            $domusClient->companies()->branches(1)->get(1),
            FakeHandler::getJson('BranchesGetById')
        );
    }
}