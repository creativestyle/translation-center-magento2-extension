<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2016 creativestyle
 */


namespace Creativestyle\TranslationCenter\Test\Integration\Service\Translation\Storage\GoogleSheets;

use Creativestyle\TranslationCenter\Service\Translation\Storage\GoogleSheets\CredentialsProviderInterface;
use Creativestyle\TranslationCenter\Test\TestCase;
use Magento\Framework\ObjectManager\ConfigInterface as ObjectManagerConfig;
use Magento\TestFramework\ObjectManager;

class CredentialsProviderInterfaceTest extends TestCase
{
    public function testPreferenceForGoogleSheetsCredentialsProviderInterfaceIsSet()
    {
        /** @var ObjectManagerConfig $diConfig */
        $diConfig = ObjectManager::getInstance()->get(ObjectManagerConfig::class);
        $this->assertNotEquals(
            CredentialsProviderInterface::class,
            $diConfig->getPreference(CredentialsProviderInterface::class)
        );
    }
}
