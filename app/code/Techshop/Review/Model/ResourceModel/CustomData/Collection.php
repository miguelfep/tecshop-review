<?php
namespace Techshop\Review\Model\ResourceModel\CustomData;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('Techshop\Review\Model\CustomData', 'Techshop\Review\Model\ResourceModel\CustomData');
    }

    /**
     * Add filter to collection to retrieve only approved reviews.
     * 
     * @return $this
     */
    public function addApprovedFilter()
    {
        $this->addFieldToFilter('is_approved', 1);
        return $this;
    }
}
