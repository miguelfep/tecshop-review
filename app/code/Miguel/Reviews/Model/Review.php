<?php
namespace Miguel\Reviews\Model;

use Magento\Framework\Model\AbstractModel;

class Review extends AbstractModel
{
    protected function _construct(): void
    {
        $this->_init('Miguel\Reviews\Model\ResourceModel\Review');
    }
}
