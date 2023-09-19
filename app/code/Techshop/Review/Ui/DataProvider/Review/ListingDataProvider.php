<?php
namespace Techshop\Review\Ui\DataProvider\Review;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory;

class ListingDataProvider extends AbstractDataProvider
{
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
