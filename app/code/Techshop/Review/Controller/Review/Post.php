<?php

namespace Techshop\Review\Controller\Review;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Techshop\Review\Model\ReviewFactory;

/**
 * Post Controller for handling review submissions.
 */
class Post extends Action
{
    /**
     * Page Factory instance.
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Review Factory instance.
     *
     * @var ReviewFactory
     */
    protected $reviewFactory;

    /**
     * Constructor.
     *
     * @param Context       $context
     * @param ReviewFactory $reviewFactory
     * @param PageFactory   $resultPageFactory
     */
    public function __construct(
        Context $context,
        ReviewFactory $reviewFactory,
        PageFactory $resultPageFactory
    ) {
        $this->reviewFactory = $reviewFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Execute the review submission action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue();

            if (!$data) {
                throw new \Magento\Framework\Exception\LocalizedException(__('Invalid form data.'));
            }

            $review = $this->reviewFactory->create();
            $review->setData($data);
            $review->save();

            $this->messageManager->addSuccessMessage(__('Your review has been submitted.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('We can\'t post your review right now. ') . $e->getMessage());
        }

        return $this->resultRedirectFactory->create()->setRefererOrBaseUrl();
    }
}
