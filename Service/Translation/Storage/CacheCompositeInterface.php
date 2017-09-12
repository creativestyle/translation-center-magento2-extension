<?php
/**
 * Translation Center for Magento 2
 *
 * @author    Marek Zabrowarny <marek.zabrowarny@creativestyle.pl>
 * @copyright 2017 creativestyle
 */


namespace Creativestyle\TranslationCenter\Service\Translation\Storage;

use Creativestyle\TranslationCenter\Service\Translation\StorageInterface;

interface CacheCompositeInterface extends StorageInterface
{
    /**
     * Saves cached data to the target storage backend
     *
     * @return void
     */
    public function persistCache();
}
