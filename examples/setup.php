<?php
/**
 * This file contains examples for using the MailLauncherApi PHP-SDK.
 *
 * @author Serban George Cristian <support@maillauncher.com>
 * @link https://www.maillauncher.com/
 * @copyright 2013-2020 https://www.maillauncher.com/
 */

//exit('COMMENT ME TO TEST THE EXAMPLES!');

// require the autoloader class if you haven't used composer to install the package
require_once dirname(__FILE__, 2) . '/MailLauncherApi/Autoloader.php';

// register the autoloader if you haven't used composer to install the package
MailLauncherApi_Autoloader::register();

// if using a framework that already uses an autoloading mechanism, like Yii for example,
// you can register the autoloader like:
// Yii::registerAutoloader(array('MailLauncherApi_Autoloader', 'autoloader'), true);

/**
 * Notes:
 * If SSL present on the webhost, the api can be accessed via SSL as well (https://...).
 * A self signed SSL certificate will work just fine.
 * If the MailLauncherApi powered website doesn't use clean urls,
 * make sure your apiUrl has the index.php part of url included, i.e:
 * https://maillauncher.com/api/index.php
 *
 * Configuration components:
 * The api for the MailLauncherApi EMA is designed to return proper etags when GET requests are made.
 * We can use this to cache the request response in order to decrease loading time therefore improving performance.
 * In this case, we will need to use a cache component that will store the responses and a file cache will do it just fine.
 * Please see MailLauncherApi/Cache for a list of available cache components and their usage.
 */

// configuration object
$config = new MailLauncherApi_Config(array(
    'apiUrl'        => 'https://maillauncher.com/api/index.php',
    'publicKey'     => 'PUBLIC-KEY',
    'privateKey'    => 'PRIVATE-KEY',

    // components
    'components' => array(
        'cache' => array(
            'class'     => 'MailLauncherApi_Cache_File',
            'filesPath' => dirname(__FILE__) . '/../MailLauncherApi/Cache/data/cache', // make sure it is writable by webserver
        )
    ),
));

// now inject the configuration and we are ready to make api calls
MailLauncherApi_Base::setConfig($config);

// start UTC
date_default_timezone_set('UTC');
