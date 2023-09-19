<?php

namespace Techshop\Review\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Exception\LocalizedException;

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

    /**
     * Valida os dados antes de salvar
     *
     * @return bool|array - Retorna true se a validação passar ou uma matriz de erros se falhar
     * @throws LocalizedException
     */
    public function validate()
    {
        $errors = [];

        if (!$this->getComment()) {
            $errors[] = __('Comment is required.');
        }

        if (!$this->getRating()) {
            $errors[] = __('Rating is required.');
        }

        if (!$this->getNickname()) {
            $errors[] = __('Nickname is required.');
        }

        if (empty($errors)) {
            return true;
        }

        throw new LocalizedException(__(implode("\n", $errors)));
    }

    /**
     * Set approval status
     */
    public function setIsApproved($status)
    {
        return $this->setData('is_approved', $status);
    }

    /**
     * Get approval status
     */
    public function getIsApproved()
    {
        return $this->getData('is_approved');
    }

    /**
     * Approve the review
     */
    public function approve()
    {
        $this->setIsApproved(1);
        return $this->save();
    }

    /**
     * Disapprove the review
     */
    public function disapprove()
    {
        $this->setIsApproved(0);
        return $this->save();
    }
}
