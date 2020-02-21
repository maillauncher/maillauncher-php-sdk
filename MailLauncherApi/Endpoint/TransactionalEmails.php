<?php
/**
 * This file contains the transactional emails endpoint for MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */
 
 
/**
 * MailLauncherApi_Endpoint_TransactionalEmails handles all the API calls for transactional emails.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @package MailLauncherApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailLauncherApi_Endpoint_TransactionalEmails extends MailLauncherApi_Base
{
    /**
     * Get all transactional emails of the current customer
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param integer $page
     * @param integer $perPage
     *
     * @return MailLauncherApi_Http_Response
     * @throws Exception
     */
    public function getEmails($page = 1, $perPage = 10)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_GET,
            'url'           => $this->getConfig()->getApiUrl('transactional-emails'),
            'paramsGet'     => array(
                'page'      => (int)$page,
                'per_page'  => (int)$perPage
            ),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }

    /**
     * Get one transactional email
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param string $emailUid
     *
     * @return MailLauncherApi_Http_Response
     * @throws Exception
     */
    public function getEmail($emailUid)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_GET,
            'url'           => $this->getConfig()->getApiUrl(sprintf('transactional-emails/%s', (string)$emailUid)),
            'paramsGet'     => array(),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }

    /**
     * Create a new transactional email
     *
     * @param array $data
     *
     * @return MailLauncherApi_Http_Response
     * @throws Exception
     */
    public function create(array $data)
    {
        if (!empty($data['body'])) {
            $data['body'] = base64_encode($data['body']);
        }
        
        if (!empty($data['plain_text'])) {
            $data['plain_text'] = base64_encode($data['plain_text']);
        }
        
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl('transactional-emails'),
            'paramsPost'    => array(
                'email'  => $data
            ),
        ));
        
        return $response = $client->request();
    }

    /**
     * Delete existing transactional email
     *
     * @param string $emailUid
     *
     * @return MailLauncherApi_Http_Response
     * @throws Exception
     */
    public function delete($emailUid)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'    => MailLauncherApi_Http_Client::METHOD_DELETE,
            'url'       => $this->getConfig()->getApiUrl(sprintf('transactional-emails/%s', $emailUid)),
        ));
        
        return $response = $client->request();
    }
}
