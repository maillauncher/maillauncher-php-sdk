<?php
/**
 * This file contains the lists endpoint for MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */
 
 
/**
 * MailLauncherApi_Endpoint_Lists handles all the API calls for lists.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @package MailLauncherApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailLauncherApi_Endpoint_Lists extends MailLauncherApi_Base
{
    /**
     * Get all the mail list of the current customer
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param integer $page
     * @param integer $perPage
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function getLists($page = 1, $perPage = 10)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_GET,
            'url'           => $this->getConfig()->getApiUrl('lists'),
            'paramsGet'     => array(
                'page'      => (int)$page,
                'per_page'  => (int)$perPage
            ),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }

    /**
     * Get one list
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param string $listUid
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function getList($listUid)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_GET,
            'url'           => $this->getConfig()->getApiUrl(sprintf('lists/%s', (string)$listUid)),
            'paramsGet'     => array(),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }

    /**
     * Create a new mail list for the customer
     *
     * The $data param must contain following indexed arrays:
     * -> general
     * -> defaults
     * -> notifications
     * -> company
     *
     * @param array $data
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function create(array $data)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('lists'),
            'paramsPost'    => $data,
        ));
        
        return $response = $client->request();
    }

    /**
     * Update existing mail list for the customer
     *
     * The $data param must contain following indexed arrays:
     * -> general
     * -> defaults
     * -> notifications
     * -> company
     *
     * @param string $listUid
     * @param array $data
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function update($listUid, array $data)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_PUT,
            'url'           => $this->getConfig()->getApiUrl(sprintf('lists/%s', $listUid)),
            'paramsPut'     => $data,
        ));
        
        return $response = $client->request();
    }

    /**
     * Copy existing mail list for the customer
     *
     * @param string $listUid
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function copy($listUid)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'    => MailLauncherApi_Http_Client::METHOD_POST,
            'url'       => $this->getConfig()->getApiUrl(sprintf('lists/%s/copy', $listUid)),
        ));
        
        return $response = $client->request();
    }

    /**
     * Delete existing mail list for the customer
     *
     * @param string $listUid
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function delete($listUid)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'    => MailLauncherApi_Http_Client::METHOD_DELETE,
            'url'       => $this->getConfig()->getApiUrl(sprintf('lists/%s', $listUid)),
        ));
        
        return $response = $client->request();
    }
}