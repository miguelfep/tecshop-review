<?php

namespace Miguel\Reviews\Model\ResourceModel\Review;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Miguel\Reviews\Model\Review;
use Miguel\Reviews\Model\ResourceModel\Review as ReviewResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'review_id';
    protected $_eventPrefix = 'miguel_reviews_review_collection';

    protected function _construct()
    {
        $this->_init(Review::class, ReviewResourceModel::class);
    }
}
