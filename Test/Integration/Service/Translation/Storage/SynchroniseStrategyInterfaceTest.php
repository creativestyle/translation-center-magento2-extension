<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2016 creativestyle
 */


namespace Creativestyle\TranslationCenter\Test\Integration\Service\Translation\Storage;

use Creativestyle\TranslationCenter\Service\Translation\Storage\SynchroniseStrategyInterface;
use Creativestyle\TranslationCenter\Test\TestCase;
use Magento\Framework\ObjectManager\ConfigInterface as ObjectManagerConfig;
use Magento\TestFramework\ObjectManager;

class SynchroniseStrategyInterfaceTest extends TestCase
{
    public function testPreferenceForTranslationStorageSynchroniseStrategyInterfaceIsSet()
    {
        /** @var ObjectManagerConfig $diConfig */
        $diConfig = ObjectManager::getInstance()->get(ObjectManagerConfig::class);
        $this->assertNotEquals(
            SynchroniseStrategyInterface::class,
            $diConfig->getPreference(SynchroniseStrategyInterface::class)
        );
    }
}
