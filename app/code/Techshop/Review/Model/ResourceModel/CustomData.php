<?php
namespace Techshop\Review\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomData extends AbstractDb
{
    protected function _construct(): void
    {
        $this->_init('techshop_review_data', 'entity_id');
    }
}
