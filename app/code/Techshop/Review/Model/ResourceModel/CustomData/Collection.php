<?php
namespace Techshop\Review\Model\ResourceModel\CustomData;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Techshop\Review\Model\CustomData as CustomDataModel;
use Techshop\Review\Model\ResourceModel\CustomData as CustomDataResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Field name for primary key.
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Initialize resource model and associated resource model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CustomDataModel::class, CustomDataResourceModel::class);
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
