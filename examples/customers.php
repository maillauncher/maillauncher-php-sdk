<?php
/**
 * This file contains examples for using the MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */
 
// require the setup which has registered the autoloader
require_once dirname(__FILE__) . '/setup.php';

// CREATE THE ENDPOINT
$endpoint = new MailLauncherApi_Endpoint_Customers();
/*===================================================================================*/

// CREATE CUSTOMER
$response = $endpoint->create(array(
    'customer' => array(
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'email'      => 'john.doe@doe.com',
        'password'   => 'superDuperPassword',
        'timezone'   => 'UTC',
    ),
    // company is optional, unless required from app settings
    'company'  => array(
        'name'     => 'John Doe LLC',
        'country'  => 'United States', // see the countries endpoint for available countries and their zones
        'zone'     => 'New York', // see the countries endpoint for available countries and their zones
        'city'     => 'Brooklyn',
        'zip_code' => 11222,
        'address_1'=> 'Some Address',
        'address_2'=> 'Some Other Address',
    ),
));

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';
