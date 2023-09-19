<?php

namespace Techshop\Review\Controller\Review;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;
use Techshop\Review\Model\ReviewFactory;

class Post extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ReviewFactory
     */
    protected $reviewFactory;

    /**
     * @param Context $context
     * @param ReviewFactory $reviewFactory
     * @param PageFactory $resultPageFactory
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
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue();

            if (!$data) {
                throw new \Exception(__('Invalid form data.'));
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
