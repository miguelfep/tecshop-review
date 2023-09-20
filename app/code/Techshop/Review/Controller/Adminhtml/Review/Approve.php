<?php

namespace Techshop\Review\Controller\Adminhtml\Review;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Techshop\Review\Model\ResourceModel\CustomData\CollectionFactory;

/**
 * Approve Controller for handling approval of reviews in the admin panel.
 */
class Approve extends Action
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
            $itemsApproved = 0;

            foreach ($collection as $review) {
                $review->setIsApproved(1)->save();
                $itemsApproved++;
            }

            $this->messageManager->addSuccessMessage(__('A total of %1 review(s) have been approved.', $itemsApproved));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong while approving the reviews. %1', $e->getMessage()));
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
