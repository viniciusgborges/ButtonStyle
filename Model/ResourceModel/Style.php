<?php

namespace Wayne\ButtonStyle\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;

class Style extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'id';

    public function __construct(
        Context $context,
        string $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
    }

    protected function _construct()
    {
        $this->_init('style_for_buttons', 'id');
    }
}
