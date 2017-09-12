<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2016 creativestyle
 */


namespace Creativestyle\TranslationCenter\Service\Translation\Storage;

use Creativestyle\TranslationCenter\Service\ConfigInterface;
use Creativestyle\TranslationCenter\Service\Translation\StorageInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\ObjectManager\NoninterceptableInterface;
use Magento\Framework\ObjectManagerInterface;

/**
 * Proxy class for translations storage interface
 */
class Proxy implements StorageInterface, NoninterceptableInterface
{
    /**
     * Object Manager instance
     *
     * @var ObjectManagerInterface
     */
    protected $objectManager = null;

    /**
     * Proxied instance name
     *
     * @var string
     */
    protected $instanceName = null;

    /**
     * Proxied instance
     *
     * @var StorageInterface
     */
    protected $subject = null;

    /**
     * Instance shareability flag
     *
     * @var boolean
     */
    protected $isShared = null;

    /**
     * Proxy constructor
     *
     * @param ObjectManagerInterface $objectManager
     * @param ConfigInterface $config
     * @param boolean $shared
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ConfigInterface $config,
        $shared = true
    ) {
        $this->objectManager = $objectManager;
        $this->instanceName = $config->isInterceptionCacheActive()
            ? CacheCompositeInterface::class
            : $config->getStorageType();
        $this->isShared = $shared;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return ['subject', 'isShared', 'instanceName'];
    }

    /**
     * Retrieve ObjectManager from global scope
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __wakeup()
    {
        $this->objectManager = ObjectManager::getInstance();
    }

    /**
     * Clone proxied instance
     */
    public function __clone()
    {
        $this->subject = clone $this->getSubject();
    }

    /**
     * Get proxied instance
     *
     * @return StorageInterface
     */
    protected function getSubject()
    {
        if (!$this->subject) {
            $this->subject = true === $this->isShared
                ? $this->objectManager->get($this->instanceName)
                : $this->objectManager->create($this->instanceName);
        }
        return $this->subject;
    }

    /**
     * @inheritdoc
     */
    public function fetch($localeCode)
    {
        return $this->getSubject()->fetch($localeCode);
    }

    /**
     * @inheritdoc
     */
    public function add($textToTranslate, $translatedText, $localeCode, array $metadata)
    {
        $this->getSubject()->add($textToTranslate, $translatedText, $localeCode, $metadata);
    }

    /**
     * @inheritdoc
     */
    public function setData(array $translationData, $localeCode)
    {
        $this->getSubject()->setData($translationData, $localeCode);
    }

    /**
     * @inheritdoc
     */
    public function persist()
    {
        $this->getSubject()->persist();
    }

    /**
     * Clears storage out of all data
     *
     * @param string $localeCode
     * @return void
     */
    public function clear($localeCode)
    {
        $this->getSubject()->clear($localeCode);
    }
}
