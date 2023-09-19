<?php
declare(strict_types=1);

namespace Techshop\Review\Model;

use Magento\Framework\Model\AbstractModel;

class CustomData extends AbstractModel
{
    protected function _construct(): void
    {
        $this->_init('Techshop\Review\Model\ResourceModel\CustomData');
    }
}
