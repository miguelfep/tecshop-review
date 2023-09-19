<?php

namespace Techshop\Review\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Review extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('techshop_review_data', 'entity_id');
    }
}
