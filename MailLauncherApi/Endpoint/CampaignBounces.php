<?php
/**
 * This file contains the campaign bounces endpoint for MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */


/**
 * MailLauncherApi_Endpoint_CampaignBounces handles all the API calls for campaign bounces.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @package MailLauncherApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailLauncherApi_Endpoint_CampaignBounces extends MailLauncherApi_Base
{
    /**
     * Get bounces from a certain campaign
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param string $campaignUid
     * @param integer $page
     * @param integer $perPage
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function getBounces($campaignUid, $page = 1, $perPage = 10)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_GET,
            'url'           => $this->getConfig()->getApiUrl(sprintf('campaigns/%s/bounces', $campaignUid)),
            'paramsGet'     => array(
                'page'      => (int)$page,
                'per_page'  => (int)$perPage,
            ),
            'enableCache'   => true,
        ));

        return $response = $client->request();
    }

    /**
     * Create a new bounce in the given campaign
     *
     * @param string $campaignUid
     * @param array $data
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function create($campaignUid, array $data)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'        => MailLauncherApi_Http_Client::METHOD_POST,
            'url'           => $this->getConfig()->getApiUrl(sprintf('campaigns/%s/bounces', (string)$campaignUid)),
            'paramsPost'    => $data,
        ));

        return $response = $client->request();
    }
}
