<?php
namespace Miguel\Reviews\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Review extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('miguel_reviews', 'review_id');
    }
}
