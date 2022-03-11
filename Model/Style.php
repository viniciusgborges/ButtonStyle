<?php

namespace Wayne\ButtonStyle\Model;

use Wayne\ButtonStyle\Api\Data\StyleInterface;

class Style extends \Magento\Framework\Model\AbstractModel implements StyleInterface
{
    const CACHE_TAG = 'style_for_buttons';
    protected $_cacheTag = 'style_for_buttons';
    protected $_eventPrefix = 'style_for_buttons';

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }

    protected function _construct()
    {
        $this->_init('Wayne\ButtonStyle\Model\ResourceModel\Style');
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id): Style
    {
        return $this->setData(self::ID, $id);
    }

    public function getColor()
    {
        return $this->getData(self::COLOR);
    }

    public function setColor($color): Style
    {
        return $this->setData(self::COLOR, $color);
    }
}
