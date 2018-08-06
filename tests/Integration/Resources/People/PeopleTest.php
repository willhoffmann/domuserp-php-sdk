<?php

namespace DomusErp\SdkTest\Integration\Resources\People;

use DomusErp\Sdk\DomusClient;
use DomusErp\SdkTest\Integration\FakeHandler;
use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase
{
    public function testGetList()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleGetList']));

        $this->assertEquals($domusClient->people()->getList(), FakeHandler::getJson('PeopleGetList'));
    }

    public function testGet()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleGetById']));

        $this->assertEquals($domusClient->people()->get(1), FakeHandler::getJson('PeopleGetById'));
    }

    public function testDeliveryAddresses()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleDeliveryAddressesGet']));

        $this->assertEquals($domusClient->people()->deliveryAddresses(1), FakeHandler::getJson('PeopleDeliveryAddressesGet'));
    }

    public function testOrderDefaultValues()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleOrderDefaultValuesGet']));

        $this->assertEquals($domusClient->people()->deliveryAddresses(1), FakeHandler::getJson('PeopleOrderDefaultValuesGet'));
    }

    public function testDocument()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleDocument']));

        $this->assertEquals($domusClient->people()->document('11435564000173'), FakeHandler::getJson('PeopleDocument'));
    }

    public function testValidateDocument()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleValidateDocument']));

        $this->assertEquals($domusClient->people()->validateDocument('11435564000173'), FakeHandler::getJson('PeopleValidateDocument'));
    }

    public function testCreate()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleGetById']));
        $person = $domusClient->people()->create();
        $person->name = 'Cê é loco cachoeira';

        $this->assertEquals($person->save(), FakeHandler::getJson('PeopleGetById'));
    }

    public function testUpdate()
    {
        $domusClient = new DomusClient('localhost', '8080', 'username', 'password');
        $domusClient->setHandler(FakeHandler::mockResponses(['LoginUser', 'LoginBranch', 'PeopleGetById']));
        $person = $domusClient->people()->update(1);
        $person->name = 'Cê é loco Cachoeira';
        $person->address(['zipCode' => '99999999']);
        $person->contacts(['phone' => '9999999999']);

        $this->assertEquals($person->save(), FakeHandler::getJson('PeopleGetById'));
    }
}