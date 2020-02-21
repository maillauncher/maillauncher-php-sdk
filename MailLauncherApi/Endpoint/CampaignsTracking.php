<?php
/**
 * This file contains the campaigns endpoint for MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */
 
 
/**
 * MailLauncherApi_Endpoint_CampaignsTracking handles all the API calls for campaigns.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @package MailLauncherApi
 * @subpackage Endpoint
 * @since 1.0
 */
class MailLauncherApi_Endpoint_CampaignsTracking extends MailLauncherApi_Base
{
    /**
     * Track campaign url click for certain subscriber
     *
     * @param string $campaignUid
     * @param string $subscriberUid
     * @param string $hash
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function trackUrl($campaignUid, $subscriberUid, $hash)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'    => MailLauncherApi_Http_Client::METHOD_GET,
            'url'       => $this->getConfig()->getApiUrl(sprintf('campaigns/%s/track-url/%s/%s', (string)$campaignUid, (string)$subscriberUid, (string)$hash)),
            'paramsGet' => array(),
        ));
        
        return $response = $client->request();
    }

    /**
     * Track campaign open for certain subscriber
     *
     * @param string $campaignUid
     * @param string $subscriberUid
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function trackOpening($campaignUid, $subscriberUid)
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'    => MailLauncherApi_Http_Client::METHOD_GET,
            'url'       => $this->getConfig()->getApiUrl(sprintf('campaigns/%s/track-opening/%s', (string)$campaignUid, (string)$subscriberUid)),
            'paramsGet' => array(),
        ));

        return $response = $client->request();
    }

    /**
     * Track campaign unsubscribe for certain subscriber
     *
     * @param string $campaignUid
     * @param string $subscriberUid
     * @param array $data
     *
     * @return MailLauncherApi_Http_Response
     * @throws ReflectionException
     */
    public function trackUnsubscribe($campaignUid, $subscriberUid, array $data = array())
    {
        $client = new MailLauncherApi_Http_Client(array(
            'method'     => MailLauncherApi_Http_Client::METHOD_POST,
            'url'        => $this->getConfig()->getApiUrl(sprintf('campaigns/%s/track-unsubscribe/%s', (string)$campaignUid, (string)$subscriberUid)),
            'paramsPost' => $data,
        ));

        return $response = $client->request();
    }
}
