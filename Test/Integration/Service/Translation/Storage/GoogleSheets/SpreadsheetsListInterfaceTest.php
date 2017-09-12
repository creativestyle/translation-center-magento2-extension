<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2017 creativestyle
 */


namespace Creativestyle\TranslationCenter\Test\Integration\Service\Translation\Storage\GoogleSheets;

use Creativestyle\TranslationCenter\Service\Translation\Storage\GoogleSheets\SpreadsheetsListInterface;
use Creativestyle\TranslationCenter\Test\TestCase;
use Magento\Framework\ObjectManager\ConfigInterface as ObjectManagerConfig;
use Magento\TestFramework\ObjectManager;

class SpreadsheetsListInterfaceTest extends TestCase
{
    public function testPreferenceForSpreadsheetsListInterfaceIsSet()
    {
        /** @var ObjectManagerConfig $diConfig */
        $diConfig = ObjectManager::getInstance()->get(ObjectManagerConfig::class);
        $this->assertNotEquals(
            SpreadsheetsListInterface::class,
            $diConfig->getPreference(SpreadsheetsListInterface::class)
        );
    }
}
