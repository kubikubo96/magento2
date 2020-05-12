<?php

namespace Codilar\HelloWorld\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\Product;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    /*public function getText()
    {
        return "Hello World";
    }*/

    /**
     * @var Registry
     */
    protected $_registry;

    protected $_catalogSession;
    protected $_customerSession;
    protected $_checkoutSession;

    /**
     * Hello constructor.
     * @param Context $context
     * @param Registry $registry
     * @param \Magento\Catalog\Model\Session $catalogSession
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param array $data
     */

    public function __construct(
        Context $context,
        Registry $registry,
        \Magento\Catalog\Model\Session $catalogSession,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    )
    {
        $this->_registry = $registry;
        $this->_catalogSession = $catalogSession;
        $this->_checkoutSession = $checkoutSession;
        $this->_customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    //Registry
    public function getProduct()
    {
        return $this->_registry->registry('current_product');
    }

    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }

    public function getCurrentCMSPage()
    {
        return $this->_registry->registry('current_cms_page');
    }

    //Session
    public function getCatalogSession()
    {
        return $this->_catalogSession;
    }

    public function getCustomerSession()
    {
        return $this->_customerSession;
    }

    public function getCheckoutSession()
    {
        return $this->_checkoutSession;
    }
}
