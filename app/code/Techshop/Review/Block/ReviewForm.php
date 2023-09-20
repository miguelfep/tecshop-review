<?php
namespace Techshop\Review\Block;

use Magento\Framework\View\Element\Template;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory;

/**
 * Review Form Block for displaying review form elements.
 */
class ReviewForm extends Template
{
    /**
     * Factory for creating custom data collection.
     *
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * ReviewForm constructor.
     *
     * @param Template\Context  $context
     * @param CollectionFactory $collectionFactory
     * @param array             $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get my collection data.
     *
     * @return array
     */
    public function getMyCollectionData()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }
}
