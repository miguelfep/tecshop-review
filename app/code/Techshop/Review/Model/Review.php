<?php

namespace Techshop\Review\Model;

use Magento\Framework\Model\AbstractModel;

class Review extends AbstractModel
{
    /**
     * Define o nome do campo de identificação para a entidade
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Prefixo do nome do evento para usar com os eventos de objeto
     *
     * @var string
     */
    protected $_eventPrefix = 'techshop_review_data';

    /**
     * Inicialização do modelo - define o modelo e o recurso do modelo
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Techshop\Review\Model\ResourceModel\Review');
    }

}
