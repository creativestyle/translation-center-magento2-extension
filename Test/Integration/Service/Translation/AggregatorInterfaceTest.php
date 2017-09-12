<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2016 creativestyle
 */


namespace Creativestyle\TranslationCenter\Test\Integration\Service\Translation\Storage;

use Creativestyle\TranslationCenter\Service\Translation\AggregatorInterface;
use Creativestyle\TranslationCenter\Test\TestCase;
use Magento\Framework\ObjectManager\ConfigInterface as ObjectManagerConfig;
use Magento\TestFramework\ObjectManager;

class AggregatorInterfaceTest extends TestCase
{
    public function testPreferenceForTranslationAggregatorInterfaceIsSet()
    {
        /** @var ObjectManagerConfig $diConfig */
        $diConfig = ObjectManager::getInstance()->get(ObjectManagerConfig::class);
        $this->assertNotEquals(AggregatorInterface::class, $diConfig->getPreference(AggregatorInterface::class));
    }
}
