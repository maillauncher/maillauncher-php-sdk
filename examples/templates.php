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
$endpoint = new MailLauncherApi_Endpoint_Templates();

/*===================================================================================*/

// GET ALL ITEMS
$response = $endpoint->getTemplates($pageNumber = 1, $perPage = 10);

// DISPLAY RESPONSE
echo '<pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// Search ALL ITEMS
$response = $endpoint->searchTemplates($pageNumber = 1, $perPage = 10, array(
    'name' => 'my template name'
));

// DISPLAY RESPONSE
echo '<pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// GET ONE ITEM
$response = $endpoint->getTemplate('TEMPLATE-UNIQUE-ID');

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// delete template
$response = $endpoint->delete('TEMPLATE-UNIQUE-ID');

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// CREATE A NEW TEMPLATE
$rand = rand();
$response = $endpoint->create(array(
    'name'          => 'My API template ' . $rand,
    'content'       => file_get_contents(dirname(__FILE__) . '/template-example.html'),
    //'archive'     => file_get_contents(dirname(__FILE__) . '/template-example.zip'),
    'inline_css'    => 'no',// yes|no
));

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// UPDATE A TEMPLATE
$response = $endpoint->update('TEMPLATE-UNIQUE-ID', array(
    'name'          => 'My API template - updated' . $rand,
    'content'       => file_get_contents(dirname(__FILE__) . '/template-example.html'),
    //'archive'     => file_get_contents(dirname(__FILE__) . '/template-example.zip'),
    'inline_css'    => 'no',// yes|no
));

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';
