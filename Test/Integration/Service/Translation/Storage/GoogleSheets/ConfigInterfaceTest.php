<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2016 creativestyle
 */


namespace Creativestyle\TranslationCenter\Test\Integration\Service\Translation\Storage\GoogleSheets;

use Creativestyle\TranslationCenter\Service\Translation\Storage\GoogleSheets\ConfigInterface;
use Creativestyle\TranslationCenter\Test\TestCase;
use Magento\Framework\ObjectManager\ConfigInterface as ObjectManagerConfig;
use Magento\TestFramework\ObjectManager;

class ConfigInterfaceTest extends TestCase
{
    public function testPreferenceForGoogleSheetsConfigInterfaceIsSet()
    {
        /** @var ObjectManagerConfig $diConfig */
        $diConfig = ObjectManager::getInstance()->get(ObjectManagerConfig::class);
        $this->assertNotEquals(ConfigInterface::class, $diConfig->getPreference(ConfigInterface::class));
    }
}
