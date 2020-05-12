<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace OpenTechiz\Blog\Block\Adminhtml;

/**
 * Adminhtml blog post content block
 */
class Post extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Block constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'OpenTechiz_Blog';
        $this->_headerText = __('Manage Blog Posts');

        parent::_construct();

        if ($this->_isAllowedAction('OpenTechiz_Blog::save')) {
            $this->buttonList->update('add', 'label', __('Add New Post'));
        } else {
            $this->buttonList->remove('add');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
