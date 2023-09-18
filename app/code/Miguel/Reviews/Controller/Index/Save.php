<?php
namespace Miguel\Reviews\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Miguel\Reviews\Model\Review;

class Save extends Action
{
    protected $review;

    public function __construct(Context $context, Review $review)
    {
        $this->review = $review;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue();
            $review = $this->review;
            $review->setData($data);
            $review->setCreatedAt(date('Y-m-d H:i:s'));
            $review->setIsApproved(0);
            $review->save();
            $this->messageManager->addSuccessMessage('Avaliação enviada com sucesso!');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage('Erro ao enviar avaliação. Tente novamente mais tarde.');
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
    }
}
