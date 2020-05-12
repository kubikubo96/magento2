<?php

namespace Openiz\HelloWorld\Controller\Cookie;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Stdlib\CookieManagerInterface;

class Readcookie extends Action
{
    /**
     * @var CookieManagerInterface
     */
    protected $_cookieManager;

    /**
     * @param Context $context
     * @param CookieManagerInterface $cookieManager
     */
    public function __construct(
        Context $context,
        CookieManagerInterface $cookieManager
    )
    {
        $this->_cookieManager = $cookieManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $cookieValue = $this->_cookieManager->getCookie(Addcookie::COOKIE_NAME);
        echo "cookie value :" . $cookieValue;
    }
}
