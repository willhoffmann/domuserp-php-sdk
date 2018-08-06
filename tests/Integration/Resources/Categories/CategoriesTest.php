<?php

namespace DomusErp\SdkTest\Integration\Resources\Categories;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class CategoriesTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'CategoriesGetList']));

        $this->assertEquals($domusClient->categories()->getList(), FakeHandler::getJson('CategoriesGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'CategoriesGetById']));

        $this->assertEquals($domusClient->categories()->get(1), FakeHandler::getJson('CategoriesGetById'));
    }

    public function testSubcategoriesGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'SubcategoriesGetList']));

        $this->assertEquals(
            $domusClient->categories()->subcategories(7)->getList(),
            FakeHandler::getJson('SubcategoriesGetList')
        );
    }

    public function testSubcategoriesGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'SubcategoriesGetById']));

        $this->assertEquals(
            $domusClient->categories()->subcategories(7)->get(2),
            FakeHandler::getJson('SubcategoriesGetById')
        );
    }
}