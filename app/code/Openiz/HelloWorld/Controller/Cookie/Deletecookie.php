<?php

namespace Openiz\HelloWorld\Controller\Cookie;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Stdlib\CookieManagerInterface;

class Deletecookie extends Action
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
        $this->_cookieManager->deleteCookie(
            Addcookie::COOKIE_NAME
        );
        echo('DELETED');
    }
}
