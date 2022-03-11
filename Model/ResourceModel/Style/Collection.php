<?php

namespace Wayne\ButtonStyle\Model\ResourceModel\Style;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected function _construct()
    {
        $this->_init(
            'Wayne\ButtonStyle\Model\Style',
            'Wayne\ButtonStyle\Model\ResourceModel\Style'
        );
    }
}
