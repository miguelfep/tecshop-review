<?php

namespace Techshop\Review\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory as ReviewCollectionFactory;

class ReviewList extends Template
{
    protected $_reviewCollectionFactory;

    public function __construct(
        Context $context,
        ReviewCollectionFactory $reviewCollectionFactory,
        array $data = []
    ) {
        $this->_reviewCollectionFactory = $reviewCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getCustomReviews()
    {
        return $this->_reviewCollectionFactory->create()->getItems();
    }
}
