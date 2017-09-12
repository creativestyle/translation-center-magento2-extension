<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2017 creativestyle
 */


namespace Creativestyle\TranslationCenter\Test\Integration\Model\System\Config\Source;

use Creativestyle\TranslationCenter\Model\System\Config\Source\StorageTypes;
use Creativestyle\TranslationCenter\Test\TestCase;
use Magento\TestFramework\ObjectManager;

/**
 * @SuppressWarnings(PHPMD.LongVariables)
 */
class StorageTypesTest extends TestCase
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    protected $storageClasses = [
        \Creativestyle\TranslationCenter\Service\Translation\Storage\GoogleSheets::class,
        \Creativestyle\TranslationCenter\Service\Translation\Storage\Csv::class,
        \Creativestyle\TranslationCenter\Service\Translation\Storage\MagentoCache::class
    ];

    protected function setUp()
    {
        $this->objectManager = ObjectManager::getInstance();
    }

    /**
     * @param array $options
     * @return array
     */
    protected function extractOptionValues(array $options)
    {
        return array_map(
            function ($option) {
                return $option['value'];
            },
            $options
        );
    }

    public function testToOptionArrayMethodReturnsArrayOfStorageClasses()
    {
        /** @var StorageTypes $storageTypesSourceModel */
        $storageTypesSourceModel = $this->objectManager->create(StorageTypes::class);
        $optionValues = $this->extractOptionValues($storageTypesSourceModel->toOptionArray());
        $this->assertEmpty(array_diff($this->storageClasses, $optionValues));
    }
}
