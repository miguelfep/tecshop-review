<?php
declare(strict_types=1);

namespace Techshop\Review\Model;

use Magento\Framework\Model\AbstractModel;
use Techshop\Review\Model\ResourceModel\CustomData as CustomDataResourceModel;

class CustomData extends AbstractModel
{
    /**
     * Initialize resource model.
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(CustomDataResourceModel::class);
    }
}
