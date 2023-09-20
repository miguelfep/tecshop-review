<?php

namespace Techshop\Review\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory as ReviewCollectionFactory;

/**
 * Block for displaying a list of custom reviews.
 */
class ReviewList extends Template
{
    /**
     * Factory for the custom review collection.
     *
     * @var ReviewCollectionFactory
     */
    protected $_reviewCollectionFactory;

    /**
     * Constructor.
     *
     * @param Context                 $context
     * @param ReviewCollectionFactory $reviewCollectionFactory
     * @param array                   $data
     */
    public function __construct(
        Context $context,
        ReviewCollectionFactory $reviewCollectionFactory,
        array $data = []
    ) {
        $this->_reviewCollectionFactory = $reviewCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve the custom reviews.
     *
     * @return \Techshop\Review\Model\ResourceModel\CustomData\Collection
     */
    public function getCustomReviews()
    {
        $collection = $this->_reviewCollectionFactory->create();
        $collection->addApprovedFilter();
        return $collection->getItems();
    }
}
