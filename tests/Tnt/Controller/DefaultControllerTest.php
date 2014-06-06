<?php

namespace Tests\Tnt\Controller;

class DefaultControllerTest extends BaseWebTestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function testIndex()
    {
        $client = $this->createClient();

        $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
    }
}
