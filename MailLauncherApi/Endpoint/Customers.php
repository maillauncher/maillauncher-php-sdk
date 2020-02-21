<?php
/**
 * This file contains the customers endpoint for MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */
 
 
/**
 * MailLauncherApi_Endpoint_Customers handles all the API calls for customers.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @package MailLauncherApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailLauncherApi_Endpoint_Customers extends MailLauncherApi_Base
{
    /**
     * Create a new mail list for the customer
     *
     * The $data param must contain following indexed arrays:
     * -> customer
     * -> company
     *
     * @param array $data
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function create(array $data)
    {
        if (isset($data['customer']['password'])) {
            $data['customer']['confirm_password'] = $data['customer']['password'];
        }
        
        if (isset($data['customer']['email'])) {
            $data['customer']['confirm_email'] = $data['customer']['email'];
        }
        
        if (empty($data['customer']['timezone'])) {
            $data['customer']['timezone'] = 'UTC';
        }
        
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('customers'),
            'paramsPost'    => $data,
        ));
        
        return $response = $client->request();
    }
}
