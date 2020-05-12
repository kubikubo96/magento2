<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace OpenTechiz\Blog\Controller\Adminhtml\Comment;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use OpenTechiz\Blog\Model\Comment;
use OpenTechiz\Blog\Model\CommentFactory;
use RuntimeException;

/**
 * Save Comment Blog Posts action.
 */
class Save extends Action
{
    /** @var Session */
    protected $_backendSession;

    /** @var CommentFactory */
    protected $_commentFactory;

    /**
     * @param Action\Context $context
     * @param Session $backendSession
     * @param CommentFactory|null $commentFactory
     */
    public function __construct(
        CommentFactory $commentFactory,
        Session $backendSession,
        Action\Context $context
    )
    {
        $this->_commentFactory = $commentFactory;
        $this->_backendSession = $backendSession;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            /** @var Comment $model */
            $model = $this->_commentFactory->create();
            $id = $this->getRequest()->getParam('comment_id');
            if ($id) {
                $model->load($id);
            }
            $model->setComment($data['comment']);
            $model->setPostId($data['post_id']);
            $model->setIsActive($data['is_active']);
            $model->setCustomerId($data['customer_id']);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved this Comment.'));
                $this->_backendSession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['comment_id' => $model->getCommentID(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the comment.'));
            }
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['comment_id' => $this->getRequest()->getParam('comment_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('OpenTechiz_Blog::save_comment');
    }
}
