<?php

namespace Openiz\HiWorld\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'mageplaza_helloworld_post';

    protected $_cacheTag = 'mageplaza_helloworld_post';

    protected $_eventPrefix = 'mageplaza_helloworld_post';

    protected function _construct()
    {
        $this->_init('Openiz\HiWorld\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
