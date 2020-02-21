<?php
/**
 * This file contains the base class for implementing caching in the MailLauncherApi PHP-SDK.
 *
 * Each class extending this one needs to implement the abstract methods.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */
 
 
/**
 * MailLauncherApi_Cache_Abstract is the base class that all the caching classes should extend.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @package MailLauncherApi
 * @subpackage Cache
 * @since 1.0
 */
abstract class MailLauncherApi_Cache_Abstract extends MailLauncherApi_Base
{
    /**
     * @var array keeps a history of loaded keys for easier and faster reference
     */
    protected $_loaded = array();
    
    /**
     * Set data into the cache
     *
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    abstract public function set($key, $value);
    
    /**
     * Get data from the cache
     *
     * @param string $key
     * @return mixed
     */
    abstract public function get($key);
    
    /**
     * Delete data from cache
     *
     * @param string $key
     * @return bool
     */
    abstract public function delete($key);
    
    /**
     * Delete all data from cache
     *
     * @return bool
     */
    abstract public function flush();
}
