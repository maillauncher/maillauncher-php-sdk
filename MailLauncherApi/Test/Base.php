<?php

use PHPUnit\Framework\TestCase;

/**
 * Class Base
 */
class MailLauncherApi_Test_Base extends TestCase
{
    public function setUp()
    {
        // configuration object
        try {
            MailLauncherApi_Base::setConfig(new MailLauncherApi_Config(array(
                'apiUrl'     => getenv('MAILLAUNCHER_API_URL'),
                'publicKey'  => getenv('MAILLAUNCHER_API_PUBLIC_KEY'),
                'privateKey' => getenv('MAILLAUNCHER_API_PRIVATE_KEY'),
            )));
        } catch (ReflectionException $e) {
        }
        
        // start UTC
        date_default_timezone_set('UTC');

        parent::setUp();
    }
}
