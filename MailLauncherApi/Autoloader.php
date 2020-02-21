<?php
/**
 * This file contains the autoloader class for the MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */
 
 
/**
 * The MailLauncherApi Autoloader class.
 *
 * From within a Yii Application, you would load this as:
 *
 * <pre>
 * require_once(Yii::getPathOfAlias('application.vendors.MailLauncherApi.Autoloader').'.php');
 * Yii::registerAutoloader(array('MailLauncherApi_Autoloader', 'autoloader'), true);
 * </pre>
 *
 * Alternatively you can:
 * <pre>
 * require_once('Path/To/MailLauncherApi/Autoloader.php');
 * MailLauncherApi_Autoloader::register();
 * </pre>
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @package MailLauncherApi
 * @since 1.0
 */
class MailLauncherApi_Autoloader
{
    /**
     * The registrable autoloader
     *
     * @param string $class
     * @return void
     */
    public static function autoloader($class)
    {
        if (strpos($class, 'MailLauncherApi') === 0) {
            $className = str_replace('_', '/', $class);
            $className = substr($className, 15);
            
            if (is_file($classFile = dirname(__FILE__) . '/'. $className.'.php')) {
                require_once($classFile);
            }
        }
    }

    /**
     * Registers the MailLauncherApi_Autoloader::autoloader()
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register('MailLauncherApi_Autoloader::autoloader');
    }
}
