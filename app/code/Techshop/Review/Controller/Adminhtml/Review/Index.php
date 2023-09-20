<?php

namespace Techshop\Review\Controller\Adminhtml\Review;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Index Controller for displaying Techshop reviews in the admin panel.
 */
class Index extends Action
{
    /**
     * Result Page Factory instance.
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor.
     *
     * @param Action\Context $context
     * @param PageFactory    $resultPageFactory
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute the controller action.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Techshop Reviews'));

        return $resultPage;
    }
}
