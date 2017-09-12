<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2017 creativestyle
 */


namespace Creativestyle\TranslationCenter\Test\Integration\Service;

use Creativestyle\TranslationCenter\Service\ConfigInterface;
use Creativestyle\TranslationCenter\Test\TestCase;
use Magento\Framework\ObjectManager\ConfigInterface as ObjectManagerConfig;
use Magento\TestFramework\ObjectManager;

class ConfigInterfaceTest extends TestCase
{
    public function testPreferenceForConfigInterfaceIsSet()
    {
        /** @var ObjectManagerConfig $diConfig */
        $diConfig = ObjectManager::getInstance()->get(ObjectManagerConfig::class);
        $this->assertNotEquals(ConfigInterface::class, $diConfig->getPreference(ConfigInterface::class));
    }
}
