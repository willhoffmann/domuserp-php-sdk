<?php

namespace DomusErp\SdkTest\Integration\Resources\ProductTaxation;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class ProductTaxationTest extends TestCase
{
    public function testISSGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationISSGetList']));

        $this->assertEquals($domusClient->productTaxation()->iss()->getList(), FakeHandler::getJson('ProductTaxationISSGetList'));
    }

    public function testISSGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationISSGetById']));

        $this->assertEquals($domusClient->productTaxation()->iss()->get(1), FakeHandler::getJson('ProductTaxationISSGetById'));
    }

    public function testIPIGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationIPIGetList']));

        $this->assertEquals($domusClient->productTaxation()->ipi()->getList(), FakeHandler::getJson('ProductTaxationIPIGetList'));
    }

    public function testIPIGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationIPIGetById']));

        $this->assertEquals($domusClient->productTaxation()->ipi()->get(1), FakeHandler::getJson('ProductTaxationIPIGetById'));
    }

    public function testICMSGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationICMSGetList']));

        $this->assertEquals($domusClient->productTaxation()->icms()->getList(), FakeHandler::getJson('ProductTaxationICMSGetList'));
    }

    public function testICMSGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationICMSGetById']));

        $this->assertEquals($domusClient->productTaxation()->icms()->get(1), FakeHandler::getJson('ProductTaxationICMSGetById'));
    }

    public function testPisCofinsGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationPisCofinsGetList']));

        $this->assertEquals($domusClient->productTaxation()->piscofins()->getList(), FakeHandler::getJson('ProductTaxationPisCofinsGetList'));
    }

    public function testPisCofinsGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationPisCofinsGetById']));

        $this->assertEquals($domusClient->productTaxation()->piscofins()->get(1), FakeHandler::getJson('ProductTaxationPisCofinsGetById'));
    }

    public function testIRGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationIRGetList']));

        $this->assertEquals($domusClient->productTaxation()->ir()->getList(), FakeHandler::getJson('ProductTaxationIRGetList'));
    }

    public function testIRGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'ProductTaxationIRGetById']));

        $this->assertEquals($domusClient->productTaxation()->ir()->get(1), FakeHandler::getJson('ProductTaxationIRGetById'));
    }
}