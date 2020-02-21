<?php

class MailLauncherApi_Test_Endpoint_ListsTest extends MailLauncherApi_Test_Base
{
    public static $listUID;

    final public function testGetLists()
    {
        /** @var MailLauncherApi_Endpoint_Lists $endpoint */
        $endpoint = new MailLauncherApi_Endpoint_Lists();

        $response = $endpoint->getLists();
        $this->assertInstanceOf(MailLauncherApi_Http_Response::class, $response);
        $this->assertIsArray($response->body->itemAt('data'));
        $this->assertArrayHasKey('records', $response->body->itemAt('data'));
    }
    
    final public function testCreateList()
    {
        /** @var MailLauncherApi_Endpoint_Lists $endpoint */
        $endpoint = new MailLauncherApi_Endpoint_Lists();

        /** @var MailLauncherApi_Http_Response $response */
        $response = $endpoint->create(array(
            // required
            'general' => array(
                'name'          => 'My list created from the API for tests',
                'description'   => 'My list created from the API for tests',
            ),
            // required
            'defaults' => array(
                'from_name' => 'John Doe',
                'from_email'=> 'johndoe@doe.com',
                'reply_to'  => 'johndoe@doe.com',
                'subject'   => 'Hello!',
            ),
            'company' => array(
                'name'      => 'John Doe INC',
                'country'   => 'United States',
                'zone'      => 'New York',
                'address_1' => 'Some street address',
                'address_2' => '',
                'zone_name' => '',
                'city'      => 'New York City',
                'zip_code'  => '10019',
            ),
        ));

        $this->assertInstanceOf(MailLauncherApi_Http_Response::class, $response);
        $this->assertTrue($response->getIsSuccess());
        $this->assertArrayHasKey('list_uid', $response->body->toArray());
        
        self::$listUID = $response->body->itemAt('list_uid');
    }
    
    final public function testGetList()
    {
        /** @var MailLauncherApi_Endpoint_Lists $endpoint */
        $endpoint = new MailLauncherApi_Endpoint_Lists();
        
        $response = $endpoint->getList(self::$listUID);
        $this->assertInstanceOf(MailLauncherApi_Http_Response::class, $response);
        $this->assertTrue($response->getIsSuccess());
        $this->assertIsArray($response->body->itemAt('data'));

        $general = isset($response->body->itemAt('data')['record']['general']) ? $response->body->itemAt('data')['record']['general'] : array();
        $this->assertArrayHasKey('list_uid', $general);
    }
    
    public function testDeleteList()
    {
        /** @var MailLauncherApi_Endpoint_Lists $endpoint */
        $endpoint = new MailLauncherApi_Endpoint_Lists();
        
        $response = $endpoint->delete(self::$listUID);
        $this->assertInstanceOf(MailLauncherApi_Http_Response::class, $response);
        $this->assertTrue($response->getIsSuccess());
    }
}
