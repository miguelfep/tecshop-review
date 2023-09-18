<?php
namespace Miguel\Reviews\Block;

use Magento\Framework\View\Element\Template;
use Miguel\Reviews\Model\ResourceModel\Review\CollectionFactory as ReviewCollectionFactory;

class ReviewList extends Template
{
    protected $_reviewCollectionFactory;

    public function __construct(
        Template\Context $context,
        ReviewCollectionFactory $reviewCollectionFactory,
        array $data = []
    ) {
        $this->_reviewCollectionFactory = $reviewCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getReviewsByProductId($productId)
    {
        // Fetch and return reviews for the given product ID
        $collection = $this->_reviewCollectionFactory->create();
        $collection->addFieldToFilter('product_id', $productId);
        $collection->addFieldToFilter('is_approved', 1); // Assuming you have an is_approved field
        $collection->setOrder('created_at', 'DESC'); // Order by creation date
        return $collection->getItems();
    }
}
