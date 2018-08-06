<?php

namespace DomusErp\SdkTest\Integration\Resources\Categories;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class BrandsTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'BrandsGetList']));

        $this->assertEquals($domusClient->brands()->getList(), FakeHandler::getJson('BrandsGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'BrandsGetById']));

        $this->assertEquals($domusClient->brands()->get(1), FakeHandler::getJson('BrandsGetById'));
    }

    public function testModelsGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'BrandModelsGetList']));

        $this->assertEquals($domusClient->brands()->models(7)->getList(), FakeHandler::getJson('BrandModelsGetList'));
    }

    public function testModelsGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'BrandModelsGetById']));

        $this->assertEquals($domusClient->brands()->models(7)->get(2), FakeHandler::getJson('BrandModelsGetById'));
    }
}