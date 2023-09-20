<?php
namespace Techshop\Review\Ui\DataProvider\Review;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory;

/**
 * Data provider for review listings.
 */
class ListingDataProvider extends AbstractDataProvider
{
    /**
     * Constructor for the data provider.
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}
