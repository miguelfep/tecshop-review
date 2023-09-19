<?php
namespace Techshop\Review\Block;

use Magento\Framework\View\Element\Template;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory;

class ReviewForm extends Template
{
    protected $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getMyCollectionData()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }
}
