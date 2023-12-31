<?php

namespace Techshop\Review\Controller\Adminhtml\Review;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory;

/**
 * Disapprove Controller for handling disapproval of reviews in the admin panel.
 */
class Disapprove extends Action
{
    /**
     * Filter instance.
     *
     * @var Filter
     */
    protected $filter;

    /**
     * Collection Factory instance.
     *
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Constructor.
     *
     * @param Context           $context
     * @param Filter            $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * Execute the controller action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $itemsDisapproved = 0;

            foreach ($collection as $review) {
                $review->setIsApproved(0)->save();
                $itemsDisapproved++;
            }

            $this->messageManager->addSuccessMessage(
                __('A total of %1 review(s) have been disapproved.', $itemsDisapproved)
            );
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(
                __('Something went wrong while disapproving the reviews. %1', $e->getMessage())
            );
        }

        return $this->_redirect('*/*/');
    }

    /**
     * Check if the action is allowed.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        // This should match the ACL resource you defined in your acl.xml
        return $this->_authorization->isAllowed('Techshop_Review::review');
    }
}
