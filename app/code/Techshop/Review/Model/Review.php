<?php

namespace Techshop\Review\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Exception\LocalizedException;
use Techshop\Review\Model\ResourceModel\Review as ReviewResourceModel;

class Review extends AbstractModel
{
    /**
     * Defines the identification field name for the entity.
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Prefix of the event name to use with object events.
     *
     * @var string
     */
    protected $_eventPrefix = 'techshop_review_data';

    /**
     * Initialization of the model - sets the model and the resource model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ReviewResourceModel::class);
    }

    /**
     * Validates data before saving.
     *
     * @return bool|array - Returns true if validation passes or an array of errors if it fails.
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
     * Set approval status.
     *
     * @param int $status Approval status (0 or 1)
     * @return $this
     */
    public function setIsApproved($status)
    {
        return $this->setData('is_approved', $status);
    }

    /**
     * Get approval status.
     */
    public function getIsApproved()
    {
        return $this->getData('is_approved');
    }

    /**
     * Approve the review.
     */
    public function approve()
    {
        $this->setIsApproved(1);
        return $this->save();
    }

    /**
     * Disapprove the review.
     */
    public function disapprove()
    {
        $this->setIsApproved(0);
        return $this->save();
    }
}
